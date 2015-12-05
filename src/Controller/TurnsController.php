<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

/**
 * Turns Controller
 *
 * @property \App\Model\Table\TurnsTable $Turns
 */
class TurnsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Appointments', 'Users']
        ];
        $this->set('turns', $this->paginate($this->Turns));
        $this->set('_serialize', ['turns']);
    }

    /**
     * View method
     *
     * @param string|null $id Turn id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $turn = $this->Turns->get($id, [
            'contain' => ['Appointments', 'Users', 'Steps']
        ]);
        $this->set('turn', $turn);
        $this->set('_serialize', ['turn']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $turn = $this->Turns->newEntity();
        if ($this->request->is('post')) {
            $turn = $this->Turns->patchEntity($turn, $this->request->data);
            if ($this->Turns->save($turn)) {
                $this->Flash->success(__('The turn has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The turn could not be saved. Please, try again.'));
            }
        }
        $appointments = $this->Turns->Appointments->find('list', ['limit' => 200]);
        $users = $this->Turns->Users->find('list', ['limit' => 200]);
        $this->set(compact('turn', 'appointments', 'users'));
        $this->set('_serialize', ['turn']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Turn id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $turn = $this->Turns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $turn = $this->Turns->patchEntity($turn, $this->request->data);
            if ($this->Turns->save($turn)) {
                $this->Flash->success(__('The turn has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The turn could not be saved. Please, try again.'));
            }
        }
        $appointments = $this->Turns->Appointments->find('list', ['limit' => 200]);
        $users = $this->Turns->Users->find('list', ['limit' => 200]);
        $this->set(compact('turn', 'appointments', 'users'));
        $this->set('_serialize', ['turn']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Turn id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $turn = $this->Turns->get($id);
        if ($this->Turns->delete($turn)) {
            $this->Flash->success(__('The turn has been deleted.'));
        } else {
            $this->Flash->error(__('The turn could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

   public function generateTurn(){
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'put', 'get']);
        
         $turn= $this->Turns->newEntity();
         $turn->appointment_id= $this->request->data["appointment_id"];
         //$turn->cashier_id= $this->request->data["cashier_id"];
         $turn->state =  "Pendiente";//$this->request->data["state"];
        if ($this->request->is('post')) {
            //debug('post');
            if ($this->Turns->save($turn)) {
              //  $this->Flash->success(__('The turn has been saved.'));
                //debug('The turn has been saved.');

                $Appointments = TableRegistry::get('Appointments');
                $appointment= $Appointments->get($this->request->data["appointment_id"], [
                    'contain' => []
                ]);;
                $appointment->state =  "En turno";
                if ($Appointments->save($appointment)) {

                }


                $this->set("turno_id",$turn["id"]);
              //  return true;
              // return $this->redirect(['action' => 'index']);
            } else {
                $this->set("turno_id",-1);
                //$this->Flash->error(__('The turn could not be saved. Please, try again.'));
            }
        }
        //debug($turn["id"]);
        $this->Auth->logout();
    }


    public function pagarTurno(){
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'put', 'get']);
        
        $turn= $this->Turns->get($this->request->data["turn_id"], [
            'contain' => []
        ]);;
        $turn->state =  "Pagado";
        $turn->cashier_id =  $this->request->data["cashier_id"];
        if ($this->Turns->save($turn)) {
            $this->set("pagado",1);

        }else{

            $this->set("pagado",0);
        }

        //debug($turn["id"]);
        $this->Auth->logout();
    }



    public function listPatientsBYTurn()
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'put', 'get']);

        //debug("listPatientsBYTurn");


        $query = $this->Turns->find();
        $query->select(["Turns.id","Users.primer_nombre","Users.primer_apellido","Users.tipo_documento","Users.documento","Users.edad","Users.genero","Appointments.name"]);
        $query->where(['Turns.state' => 'Pendiente']);
        $query->innerJoin(
                ['Appointments' => 'appointments'],
                ['Appointments.id = Turns.appointment_id']);
        $query->innerJoin(
                ['Users' => 'users'],
                ['Users.id = Appointments.patient_id']);


        $Users = TableRegistry::get('Users');

       /* $query = $Users->find();
        $query->select(["Turns.id","Users.primer_nombre","Users.primer_apellido","Users.tipo_documento","Users.documento","Users.edad","Users.genero","Appointments.name"]);
        $query->innerJoin(
                ['Appointments' => 'appointments'],
                ['Appointments.patient_id = Users.id']);
        $query->innerJoin(
                ['Turns' => 'turns'],
                ['Turns.state' => 'Pendiente'],
                ['Turns.appointment_id = Appointments.id']);*/

        
         $this->set('datos',$query->toArray());
   /*
            foreach ($query as $user) {
                debug($user);
                }
    */

        $this->Auth->logout();

    }


    public function listPatientsbyAttention()
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'put', 'get']);

        //debug("listPatientsBYTurn");


        $query = $this->Turns->find();
        $query->select(["Turns.id","Users.primer_nombre","Users.primer_apellido","Users.tipo_documento","Users.documento","Users.edad","Users.genero","Appointments.name"]);
        $query->where(['Turns.state' => 'Pagado']);
        $query->innerJoin(
                ['Appointments' => 'appointments'],
                ['Appointments.id = Turns.appointment_id']);
        $query->innerJoin(
                ['Users' => 'users'],
                ['Users.id = Appointments.patient_id']);


       /* $query = $Users->find();
        $query->select(["Turns.id","Users.primer_nombre","Users.primer_apellido","Users.tipo_documento","Users.documento","Users.edad","Users.genero","Appointments.name"]);
        $query->innerJoin(
                ['Appointments' => 'appointments'],
                ['Appointments.patient_id = Users.id']);
        $query->innerJoin(
                ['Turns' => 'turns'],
                ['Turns.state' => 'Pendiente'],
                ['Turns.appointment_id = Appointments.id']);*/

        
         $this->set('datos',$query->toArray());
   /*
            foreach ($query as $user) {
                debug($user);
                }
    */

        $this->Auth->logout();

    }

    public function finalizarCita(){
       $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'put', 'get']);
        
        $turn= $this->Turns->get($this->request->data["turn_id"], [
            'contain' => []
        ]);;
        $turn->state =  "Cerrado";
        if ($this->Turns->save($turn)) {
            $this->set("cerrado",1);

        }else{

            $this->set("cerrado",0);
        }

        //debug($turn["id"]);
        $this->Auth->logout();
    }



}
