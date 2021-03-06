<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

/**
 * Appointments Controller
 *
 * @property \App\Model\Table\AppointmentsTable $Appointments
 */
class AppointmentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('appointments', $this->paginate($this->Appointments));
        $this->set('_serialize', ['appointments']);
    }

    /**
     * View method
     *
     * @param string|null $id Appointment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['Users', 'Turns']
        ]);
        $this->set('appointment', $appointment);
        $this->set('_serialize', ['appointment']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appointment = $this->Appointments->newEntity();
        if ($this->request->is('post')) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->data);
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
            }
        }
        $patients = $this->Appointments->Users->find('list', ['limit' => 200])->where(['Users.group_id'=>1]);
        $doctors = $this->Appointments->Users->find('list', ['limit' => 200])->where(['Users.group_id'=>2]);

        $this->set(compact('appointment', 'patients', 'doctors'));
        $this->set('_serialize', ['appointment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Appointment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->data);
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
            }
        }
        $users = $this->Appointments->Users->find('list', ['limit' => 200]);
        $this->set(compact('appointment', 'users'));
        $this->set('_serialize', ['appointment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appointment = $this->Appointments->get($id);
        if ($this->Appointments->delete($appointment)) {
            $this->Flash->success(__('The appointment has been deleted.'));
        } else {
            $this->Flash->error(__('The appointment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function listAppointmentsByPatient(){
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'put', 'get']);
        
        $tipo_documento = $this->request->data["tipo_doc"];
        $documento = $this->request->data["doc"];

        //Cargar un modelo (Clase) diferente al del controlador
        $Users = TableRegistry::get('Users');

        //Consulta id del paciente
        $query_patient_id = $Users->find();
        $query_patient_id->select("id");
        $query_patient_id->where([
                        "Users.tipo_documento"=>$tipo_documento,
                        "Users.documento"=>$documento
                    ]);
        $query_patient_id->first();

    
        //Verificar queries
        //debug($patient_id->execute());

        //Ejecutar queries
        foreach ($query_patient_id as $key => $value) {
            $patient_id = $value["id"];
        }

        if(isset($patient_id)){
            //Consultando del modelo asociado al controlador
            //Variable = $this=> Controlador -> operacion
            $query_listAppointments = $this->Appointments->find("all");
            $query_listAppointments->select(["Appointments.id","Appointments.doctor_id","Appointments.name","Appointments.detail","Appointments.date","Appointments.state","Appointments.created"]);
            $query_listAppointments->where([
                "Appointments.patient_id" => $patient_id,
                "Appointments.state" => "Pendiente"
                ]);
            //debug($query_listAppointments);
            $this->set('listAppointments',$query_listAppointments->toArray());
        }else{
            $this->set('listAppointments',array());
        }

        //Ejecutar
        //debug($query_listAppointments->toArray());
            
        //debug($respuesta);
       //Envia a la vista y/o Ejecuta 

        $this->Auth->logout();
    }

    public function updateAppAppointmentsId()
    {
       
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'put', 'get']);

        debug("updateAppAppointmentsId");
        $id = $this->request->data["appointment_id"];
        debug("Id =>");
        debug($id);
        $query_Appointments = $this->Appointments->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            debug('post');
            //$step = $this->Steps->patchEntity($step, $this->request->data);
            $query_Appointments->state = 'Cerrada';
            if ($this->Appointments->save($query_Appointments)) {
              /*  $this->Flash->success(__('The step has been saved.'));
                return $this->redirect(['action' => 'index']);*/
                debug('The turn has been saved.');
            } else {
                 debug('The turn could not be saved. Please, try again.');/*
                $this->Flash->error(__('The step could not be saved. Please, try again.'));*/
            }
        }
        $this->Auth->logout();
    }

}
