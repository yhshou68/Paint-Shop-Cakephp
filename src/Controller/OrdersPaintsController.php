<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OrdersPaints Controller
 *
 * @property \App\Model\Table\OrdersPaintsTable $OrdersPaints
 */
class OrdersPaintsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->OrdersPaints->find()
            ->contain(['Orders', 'Paints']);
        $ordersPaints = $this->paginate($query);

        $this->set(compact('ordersPaints'));
    }

    /**
     * View method
     *
     * @param string|null $id Orders Paint id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordersPaint = $this->OrdersPaints->get($id, contain: ['Orders', 'Paints']);
        $this->set(compact('ordersPaint'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordersPaint = $this->OrdersPaints->newEmptyEntity();
        if ($this->request->is('post')) {
            $ordersPaint = $this->OrdersPaints->patchEntity($ordersPaint, $this->request->getData());
            if ($this->OrdersPaints->save($ordersPaint)) {
                $this->Flash->success(__('The orders paint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders paint could not be saved. Please, try again.'));
        }
        $orders = $this->OrdersPaints->Orders->find('list', limit: 200)->all();
        $paints = $this->OrdersPaints->Paints->find('list', limit: 200)->all();
        $this->set(compact('ordersPaint', 'orders', 'paints'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orders Paint id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordersPaint = $this->OrdersPaints->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersPaint = $this->OrdersPaints->patchEntity($ordersPaint, $this->request->getData());
            if ($this->OrdersPaints->save($ordersPaint)) {
                $this->Flash->success(__('The orders paint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders paint could not be saved. Please, try again.'));
        }
        $orders = $this->OrdersPaints->Orders->find('list', limit: 200)->all();
        $paints = $this->OrdersPaints->Paints->find('list', limit: 200)->all();
        $this->set(compact('ordersPaint', 'orders', 'paints'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orders Paint id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordersPaint = $this->OrdersPaints->get($id);
        if ($this->OrdersPaints->delete($ordersPaint)) {
            $this->Flash->success(__('The orders paint has been deleted.'));
        } else {
            $this->Flash->error(__('The orders paint could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
