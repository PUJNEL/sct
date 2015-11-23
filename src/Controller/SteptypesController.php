<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

/**
 * Steptypes Controller
 *
 * @property \App\Model\Table\SteptypesTable $Steptypes
 */
class SteptypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('steptypes', $this->paginate($this->Steptypes));
        $this->set('_serialize', ['steptypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Steptype id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $steptype = $this->Steptypes->get($id, [
            'contain' => ['Steps']
        ]);
        $this->set('steptype', $steptype);
        $this->set('_serialize', ['steptype']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $steptype = $this->Steptypes->newEntity();
        if ($this->request->is('post')) {
            $steptype = $this->Steptypes->patchEntity($steptype, $this->request->data);
            if ($this->Steptypes->save($steptype)) {
                $this->Flash->success(__('The steptype has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The steptype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('steptype'));
        $this->set('_serialize', ['steptype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Steptype id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $steptype = $this->Steptypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $steptype = $this->Steptypes->patchEntity($steptype, $this->request->data);
            if ($this->Steptypes->save($steptype)) {
                $this->Flash->success(__('The steptype has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The steptype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('steptype'));
        $this->set('_serialize', ['steptype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Steptype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $steptype = $this->Steptypes->get($id);
        if ($this->Steptypes->delete($steptype)) {
            $this->Flash->success(__('The steptype has been deleted.'));
        } else {
            $this->Flash->error(__('The steptype could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
