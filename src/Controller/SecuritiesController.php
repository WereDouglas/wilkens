<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Securities Controller
 *
 * @property \App\Model\Table\SecuritiesTable $Securities
 *
 * @method \App\Model\Entity\Security[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SecuritiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users','Requesteds','Approveds']
        ];
        $securities = $this->paginate($this->Securities);

        $this->set(compact('securities'));
    }

    /**
     * View method
     *
     * @param string|null $id Security id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $security = $this->Securities->get($id, [
            'contain' => ['Users','Requesteds','Approveds']
        ]);

        $this->set('security', $security);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $security = $this->Securities->newEntity();
        if ($this->request->is('post')) {
            $security = $this->Securities->patchEntity($security, $this->request->getData());
            if ($this->Securities->save($security)) {
                if ($this->usingApi) {
                    $id = $security->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The security has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            if ($this->usingApi) {
                 var_dump($security->getErrors());
                 exit;
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The security could not be saved. Please, try again.'));
        }
        $users = $this->Securities->Users->find('list', ['limit' => 200]);
        $this->set(compact('security', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Security id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $security = $this->Securities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $security = $this->Securities->patchEntity($security, $this->request->getData());
            if ($this->Securities->save($security)) {
                $this->Flash->success(__('The security has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The security could not be saved. Please, try again.'));
        }
        $users = $this->Securities->Users->find('list', ['limit' => 200]);
        $this->set(compact('security', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Security id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $security = $this->Securities->get($id);
        if ($this->Securities->delete($security)) {
            $this->Flash->success(__('The security has been deleted.'));
        } else {
            $this->Flash->error(__('The security could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
