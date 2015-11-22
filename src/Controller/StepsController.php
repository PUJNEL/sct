<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Steps Controller
 *
 * @property \App\Model\Table\StepsTable $Steps
 */
class StepsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Turns', 'Steptypes']
        ];
        $this->set('steps', $this->paginate($this->Steps));
        $this->set('_serialize', ['steps']);
    }

    /**
     * View method
     *
     * @param string|null $id Step id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $step = $this->Steps->get($id, [
            'contain' => ['Turns', 'Steptypes']
        ]);
        $this->set('step', $step);
        $this->set('_serialize', ['step']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $step = $this->Steps->newEntity();
        if ($this->request->is('post')) {
            $step = $this->Steps->patchEntity($step, $this->request->data);
            if ($this->Steps->save($step)) {
                $this->Flash->success(__('The step has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The step could not be saved. Please, try again.'));
            }
        }
        $turns = $this->Steps->Turns->find('list', ['limit' => 200]);
        $steptypes = $this->Steps->Steptypes->find('list', ['limit' => 200]);
        $this->set(compact('step', 'turns', 'steptypes'));
        $this->set('_serialize', ['step']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Step id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $step = $this->Steps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $step = $this->Steps->patchEntity($step, $this->request->data);
            if ($this->Steps->save($step)) {
                $this->Flash->success(__('The step has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The step could not be saved. Please, try again.'));
            }
        }
        $turns = $this->Steps->Turns->find('list', ['limit' => 200]);
        $steptypes = $this->Steps->Steptypes->find('list', ['limit' => 200]);
        $this->set(compact('step', 'turns', 'steptypes'));
        $this->set('_serialize', ['step']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Step id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $step = $this->Steps->get($id);
        if ($this->Steps->delete($step)) {
            $this->Flash->success(__('The step has been deleted.'));
        } else {
            $this->Flash->error(__('The step could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
