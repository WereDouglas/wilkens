<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Exceptions Controller
 *
 * @property \App\Model\Table\ExceptionsTable $Exceptions
 *
 * @method \App\Model\Entity\Exception[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExceptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $exceptions = $this->paginate($this->Exceptions);

        $this->set(compact('exceptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Exception id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exception = $this->Exceptions->get($id, [
            'contain' => []
        ]);

        $this->set('exception', $exception);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exception = $this->Exceptions->newEntity();
        if ($this->request->is('post')) {
            $exception = $this->Exceptions->patchEntity($exception, $this->request->getData());
            if ($this->Exceptions->save($exception)) {
                if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                    $id = $exception->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The exception has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                // throw new MissingWidgetException();
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The exception could not be saved. Please, try again.'));
        }
        $this->set(compact('exception'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exception id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exception = $this->Exceptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exception = $this->Exceptions->patchEntity($exception, $this->request->getData());
            if ($this->Exceptions->save($exception)) {
                $this->Flash->success(__('The exception has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exception could not be saved. Please, try again.'));
        }
        $this->set(compact('exception'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exception id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exception = $this->Exceptions->get($id);
        if ($this->Exceptions->delete($exception)) {
            $this->Flash->success(__('The exception has been deleted.'));
        } else {
            $this->Flash->error(__('The exception could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
