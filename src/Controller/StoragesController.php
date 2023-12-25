<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Storages Controller
 *
 * @property \App\Model\Table\StoragesTable $Storages
 */
class StoragesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Storages->find();
        $storages = $this->paginate($query);

        $this->set(compact('storages'));
    }

    /**
     * View method
     *
     * @param string|null $id Storage id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storage = $this->Storages->get($id, contain: ['Paints']);
        $this->set(compact('storage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storage = $this->Storages->newEmptyEntity();
        if ($this->request->is('post')) {
            $storage = $this->Storages->patchEntity($storage, $this->request->getData());
            if ($this->Storages->save($storage)) {
                $this->Flash->success(__('The storage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storage could not be saved. Please, try again.'));
        }
        $paints = $this->Storages->Paints->find('list', limit: 200)->all();
        $this->set(compact('storage', 'paints'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Storage id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storage = $this->Storages->get($id, contain: ['Paints']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storage = $this->Storages->patchEntity($storage, $this->request->getData());
            if ($this->Storages->save($storage)) {
                $this->Flash->success(__('The storage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storage could not be saved. Please, try again.'));
        }
        $paints = $this->Storages->Paints->find('list', limit: 200)->all();
        $this->set(compact('storage', 'paints'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Storage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storage = $this->Storages->get($id);
        if ($this->Storages->delete($storage)) {
            $this->Flash->success(__('The storage has been deleted.'));
        } else {
            $this->Flash->error(__('The storage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
