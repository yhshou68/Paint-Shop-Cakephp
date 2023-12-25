<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PaintsStorages Controller
 *
 * @property \App\Model\Table\PaintsStoragesTable $PaintsStorages
 */
class PaintsStoragesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->PaintsStorages->find()
            ->contain(['Paints', 'Storages']);
        $paintsStorages = $this->paginate($query);

        $this->set(compact('paintsStorages'));
    }

    /**
     * View method
     *
     * @param string|null $id Paints Storage id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paintsStorage = $this->PaintsStorages->get($id, contain: ['Paints', 'Storages']);
        $this->set(compact('paintsStorage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paintsStorage = $this->PaintsStorages->newEmptyEntity();
        if ($this->request->is('post')) {
            $paintsStorage = $this->PaintsStorages->patchEntity($paintsStorage, $this->request->getData());
            if ($this->PaintsStorages->save($paintsStorage)) {
                $this->Flash->success(__('The paints storage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paints storage could not be saved. Please, try again.'));
        }
        $paints = $this->PaintsStorages->Paints->find('list', limit: 200)->all();
        $storages = $this->PaintsStorages->Storages->find('list', limit: 200)->all();
        $this->set(compact('paintsStorage', 'paints', 'storages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paints Storage id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paintsStorage = $this->PaintsStorages->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paintsStorage = $this->PaintsStorages->patchEntity($paintsStorage, $this->request->getData());
            if ($this->PaintsStorages->save($paintsStorage)) {
                $this->Flash->success(__('The paints storage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paints storage could not be saved. Please, try again.'));
        }
        $paints = $this->PaintsStorages->Paints->find('list', limit: 200)->all();
        $storages = $this->PaintsStorages->Storages->find('list', limit: 200)->all();
        $this->set(compact('paintsStorage', 'paints', 'storages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paints Storage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paintsStorage = $this->PaintsStorages->get($id);
        if ($this->PaintsStorages->delete($paintsStorage)) {
            $this->Flash->success(__('The paints storage has been deleted.'));
        } else {
            $this->Flash->error(__('The paints storage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
