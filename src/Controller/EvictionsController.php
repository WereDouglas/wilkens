<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Evictions Controller
 *
 * @property \App\Model\Table\EvictionsTable $Evictions
 *
 * @method \App\Model\Entity\Eviction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EvictionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $evictions = $this->paginate($this->Evictions);

        $this->set(compact('evictions'));
    }

    /**
     * View method
     *
     * @param string|null $id Eviction id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eviction = $this->Evictions->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('eviction', $eviction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eviction = $this->Evictions->newEntity();
        if ($this->request->is('post')) {
            $eviction = $this->Evictions->patchEntity($eviction, $this->request->getData());
            if ($this->Evictions->save($eviction)) {
                if ($this->usingApi) {
                    $id = $eviction->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The eviction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } if ($this->usingApi) {
                // throw new MissingWidgetException();
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The eviction could not be saved. Please, try again.'));
        }
        $users = $this->Evictions->Users->find('list', ['limit' => 200]);
        $this->set(compact('eviction', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Eviction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eviction = $this->Evictions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eviction = $this->Evictions->patchEntity($eviction, $this->request->getData());
            if ($this->Evictions->save($eviction)) {
                $this->Flash->success(__('The eviction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The eviction could not be saved. Please, try again.'));
        }
        $users = $this->Evictions->Users->find('list', ['limit' => 200]);
        $this->set(compact('eviction', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Eviction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eviction = $this->Evictions->get($id);
        if ($this->Evictions->delete($eviction)) {
            $this->Flash->success(__('The eviction has been deleted.'));
        } else {
            $this->Flash->error(__('The eviction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
