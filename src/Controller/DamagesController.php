<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Damages Controller
 *
 * @property \App\Model\Table\DamagesTable $Damages
 *
 * @method \App\Model\Entity\Damage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DamagesController extends AppController
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
        $damages = $this->paginate($this->Damages);

        $this->set(compact('damages'));
    }

    /**
     * View method
     *
     * @param string|null $id Damage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $damage = $this->Damages->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('damage', $damage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $damage = $this->Damages->newEntity();
        if ($this->request->is('post')) {
            $damage = $this->Damages->patchEntity($damage, $this->request->getData());
            if ($this->Damages->save($damage)) {
                if ($this->usingApi) {
                    $id = $damage->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The damage has been saved.'));

                return $this->redirect(['action' => 'index']);
            } if ($this->usingApi) {
                // throw new MissingWidgetException();
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The damage could not be saved. Please, try again.'));
        }
        $users = $this->Damages->Users->find('list', ['limit' => 200]);
        $this->set(compact('damage', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Damage id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $damage = $this->Damages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $damage = $this->Damages->patchEntity($damage, $this->request->getData());
            if ($this->Damages->save($damage)) {
                $this->Flash->success(__('The damage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The damage could not be saved. Please, try again.'));
        }
        $users = $this->Damages->Users->find('list', ['limit' => 200]);
        $this->set(compact('damage', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Damage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $damage = $this->Damages->get($id);
        if ($this->Damages->delete($damage)) {
            $this->Flash->success(__('The damage has been deleted.'));
        } else {
            $this->Flash->error(__('The damage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
