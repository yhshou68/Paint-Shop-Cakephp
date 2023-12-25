<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Paints Controller
 *
 * @property \App\Model\Table\PaintsTable $Paints
 */
class PaintsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Paints->find();
        $paints = $this->paginate($query);

        $this->set(compact('paints'));
    }

    /**
     * View method
     *
     * @param string|null $id Paint id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paint = $this->Paints->get($id, contain: ['Orders', 'Storages']);
        $this->set(compact('paint'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paint = $this->Paints->newEmptyEntity();
        if ($this->request->is('post')) {
            $paint = $this->Paints->patchEntity($paint, $this->request->getData());
            if ($this->Paints->save($paint)) {
                $this->Flash->success(__('The paint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paint could not be saved. Please, try again.'));
        }
        $orders = $this->Paints->Orders->find('list', limit: 200)->all();
        $storages = $this->Paints->Storages->find('list', limit: 200)->all();
        $this->set(compact('paint', 'orders', 'storages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paint id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paint = $this->Paints->get($id, contain: ['Orders', 'Storages']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paint = $this->Paints->patchEntity($paint, $this->request->getData());
            if ($this->Paints->save($paint)) {
                $this->Flash->success(__('The paint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paint could not be saved. Please, try again.'));
        }
        $orders = $this->Paints->Orders->find('list', limit: 200)->all();
        $storages = $this->Paints->Storages->find('list', limit: 200)->all();
        $this->set(compact('paint', 'orders', 'storages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paint id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paint = $this->Paints->get($id);
        if ($this->Paints->delete($paint)) {
            $this->Flash->success(__('The paint has been deleted.'));
        } else {
            $this->Flash->error(__('The paint could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
