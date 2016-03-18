<?php

class Compositeur extends CI_Controller   {
	public function index()
 	{     
		$this->load->helper(array('form'));
		$this->compositeurs_model;
		     $compositeurs =  $this->compositeurs_model->findAll();
              $config['total_rows'] = $this->compositeurs_model->getCountTable();
            $data['context'] = 'list';
            $data['titre'] = 'Liste de compositeurs';
            $data['liste_compositeurs'] = array('liste_compositeurs'=> $compositeurs);
             $this->load->view('layout',$data);

	}

	public function add()
   	{
   			$data['nom'] = $this->input->post('nom',TRUE);
   			$data['prenom'] = $this->input->post('prenom',TRUE);
   			$this->compositeurs_model->add($data);
   			$data['context'] = 'message';
   			$data['titre'] = 'Saisie validée';
   			$this->load->view('layout',$data);
   	}

  public function  delete()
        {
            
         $id = $this->uri->segment(3,-1);
             $this->compositeurs_model->delete($id);
            $data['context'] = 'message';
            $this->load->view('layout',$data);

        }

    public function show_update($id=-1)
        {
            if($id==-1)
            $id = $this->uri->segment(3,-1);
            $data['compositeur'] = array('compositeur'=> $this->compositeurs_model->find($id));
            $data['context'] = 'edit';
            $data['mode'] = 'update';
            $data['mode_titre'] = 'Modifier';
            $data['id'] = $id;
            $data['titre'] = 'Liste de compositeurs';
            $data['titre_edit'] = 'Modifier un compositeur';
            $this->load->view('layout',$data);
        }


        public function show_add()
        {
            
            $data['context'] = 'edit';
            $data['mode'] = 'add';
            $data['mode_titre'] = 'Ajouter';
            $data['titre'] = 'Liste de compositeurs';
            $data['compositeur'] = array();
            $data['id'] = '';
            $data['titre_edit'] = 'Ajouter un compositeur';
            $this->load->view('layout',$data);
        }


        public function update()
        {
            
            $data['id'] = $this->input->post('id',TRUE);
            $data['nom'] = $this->input->post('nom',TRUE);
            $data['prenom'] = $this->input->post('prenom',TRUE);
               $this->compositeurs_model->update($data['id'],$data);
               $data['titre'] = 'Saisie validée';
               $data['context'] = 'message';
               $this->load->view('layout',$data);
       
        }

        public function testCompositeurExists()
        {
             
             $prenom = $this->input->post('prenom',TRUE);
             $nom = $this->input->post('nom',TRUE);

             $test = $this->Compositeurs_model->isCompositeurExists($nom,$prenom);

             if ($test)
             {
                $this->form_validation->set_message('testCompositeurExists', 'Ce nom et ce prénom éxistent déjà');
                return FALSE;

             }
             return  $test;
        }

}
