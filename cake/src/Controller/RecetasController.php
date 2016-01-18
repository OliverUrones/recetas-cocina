<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recetas Controller
 *
 * @property \App\Model\Table\RecetasTable $Recetas
 */
class RecetasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
         
        $usuario= $this->request->session()->read('Auth.User');
        $this->Auth->allow('fichadetallada');
         $this->Auth->allow('portada');
		 
			//Permisos para poder dejar como publica la busqueda de recetas
			$this->Auth->allow('busqueda');
			$this->Auth->allow('busquedafiltros');
			$this->Auth->allow('busquedaver');
			
			
        if($usuario['rol']=='C'){
            $this->Auth->allow('index');
            $this->Auth->allow('view');
            $this->Auth->allow('add');
            $this->Auth->allow('edit');
            $this->Auth->allow('delete');
        }
         $this->Auth->redirectUrl();
    }//---*/
        public $misrecetas;
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $recetas=$this->paginate($this->Recetas);
        $usuario= $this->request->session()->read('Auth.User');
        if($usuario['rol']=='C'){
            $aux=array();
            foreach($recetas as $receta){
                if($receta->usuario_id==$usuario['id']){
                    array_push($aux,$receta);
                }
                $recetas=$aux;
            }
           
        }
        $this->set('recetas',$recetas);
        $this->set('_serialize', ['recetas']);
    }

     public function portada()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $recetas=$this->paginate($this->Recetas);
        /*$usuario= $this->request->session()->read('Auth.User');
        if($usuario['rol']=='C'){
            $aux=array();
            foreach($recetas as $receta){
                if($receta->usuario_id==$usuario['id']){
                    array_push($aux,$receta);
                }
                $recetas=$aux;
            }
           
        }*/
        $this->set('recetas',$recetas);
        $this->set('_serialize', ['recetas']);
    }
    
    public function view($id = null)
    {
        $receta = $this->Recetas->get($id, [
            'contain' => [ /*'MenuPlatos', 'RecetaCategorias', */'RecetaComentarios', 'RecetaIngredientes', 'RecetaPasos']
        ]);
        $this->set('receta', $receta);
        $this->set('_serialize', ['receta']);
    }
    
     public function fichadetallada($id = null)
    {
        $receta = $this->Recetas->get($id, [
            'contain' => [ /*'MenuPlatos',*/ 'RecetaCategorias', 'RecetaComentarios', 'RecetaIngredientes', 'RecetaPasos']
        ]);
        $pasos=array();
        foreach ($receta->receta_pasos as $recetaPasos)
        {
            $rp = $this->Recetas->RecetaPasos->get($recetaPasos->id, ['contain' => ['Recetas', 'RecetaPasoImagenes']]);
            array_push($pasos,$rp);
            
        }
        
        $ingredientes=array();
         foreach ($receta->receta_ingredientes as $RecetaIngredientes)
        {
            $ing = $this->Recetas->RecetaIngredientes->get($RecetaIngredientes->id, ['contain' => ['Ingredientes'] ]);
            array_push($ingredientes,$ing);
        }
       
        $comentarios=array();
         foreach ($receta->receta_comentarios as $RecetaComentarios)
        {
            $com = $this->Recetas->RecetaComentarios->get($RecetaComentarios->id, ['contain' => ['Usuarios'] ]);
            array_push($comentarios,$com);
        }
       
       
        $this->set(compact('receta', 'pasos','ingredientes','comentarios'));
        
        
        
        $this->set('_serialize', ['receta']);
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $receta = $this->Recetas->newEntity();
		
        if ($this->request->is('post')) {
            $receta = $this->Recetas->patchEntity($receta, $this->request->data);
	    $usuario= $this->request->session()->read('Auth.User');
	    $receta->usuario_id = $usuario['id'];
            if ($this->Recetas->save($receta)) {
                $this->Flash->success(__('La receta ha sido guardada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La receta no se ha guardado. Por favor,intentelo de nuevo.'));
            }
        }
        //$usuarios = $this->Recetas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('receta', '$usuario'));
        $this->set('_serialize', ['receta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id=null)
    {
      
        $receta = $this->Recetas->get( $id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $receta = $this->Recetas->patchEntity($receta, $this->request->data);
            if ($this->Recetas->save($receta)) {
                
                $this->Flash->success(__('La receta ha sido guardada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La receta no se ha guardado. Por favor,intentelo de nuevo.'));
            }
        }
        $usuarios = $this->Recetas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('receta', 'usuarios'));
        $this->set('_serialize', ['receta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Receta id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $receta = $this->Recetas->get($id);
        if ($this->Recetas->delete($receta)) {
            $this->Flash->success(__('La receta ha sido eliminada.'));
        } else {
            $this->Flash->error(__('La receta no se ha eliminado. Por favor,intentelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	
	//Funcion para la busqueda de recetas
	public function busqueda()
	{
		$this->Auth->allow();
	}//funcion busqueda
	
	//Funcion para buscar y mostrar los resultados de la busqueda de recetas	
	public function busquedaver()
	{
	
    $this->Auth->allow();
	
	$this->set('recetas', $this->paginate($this->Recetas));
        $this->set('_serialize', ['recetas']);
		
	$busqueda = $this->Recetas->newEntity();
	
					
					if ($this->request->is('post')) {
						$busqueda = $this->Recetas->patchEntity($busqueda, $this->request->data);
						
					}
				
				/*Obtenemos los terminos de la busqueda*/
				//Comprobamos si es nulo. En caso de ser nulo significa que debemos buscar cualquier nombre
				if (empty($busqueda->nombre1))
				{
					//debemos buscar cualquier nombre
					$busqueda->nombre1="'%%'";
				}
				
				//Comprobamos si es nulo. En caso de ser nulo significa que debemos buscar cualquier tipo de plato
				if (empty($busqueda->tipo_plato1))
				{
					//debemos buscar cualquier tipo de plato
					$busqueda->tipo_plato1="'%%'";
				}
				
				//Comprobamos si es nulo. En caso de ser nulo significa que debemos buscar cualquier dificultad
				if (empty($busqueda->dificultad1))
				{
					//debemos buscar cualquier dificultad
					$busqueda->dificultad1="'%%'";
				}
				
				//Comprobamos si es nulo. En caso de ser nulo significa que debemos buscar cualquier comensales
				if (empty($busqueda->comensales1))
				{
					//debemos buscar cualquier comensales
					$busqueda->comensales1="'%%'";
				}
				
				//Comprobamos si es nulo. En caso de ser nulo significa que debemos buscar cualquier tiempo_elaboracion
				if (empty($busqueda->tiempo_elaboracion1))
				{
					//debemos buscar cualquier tiempo_elaboracion
					$busqueda->tiempo_elaboracion1="'%%'";
				}
				
				//Comprobamos si es nulo. En caso de ser nulo significa que debemos buscar cualquier valoracion
				if (empty($busqueda->valoracion1))
				{
					//debemos buscar cualquier valoracion
					$busqueda->valoracion1="'%%'";
				}
				
				
					
				
				$query = $this->Recetas->find();
				$query-> select(['id', 'nombre', 'tipo_plato', 'descripcion', 'dificultad', 'comensales', 'tiempo_elaboracion', 'valoracion']);			
				$query->where(['nombre LIKE'=>$busqueda->nombre1, 'tipo_plato LIKE'=>$busqueda->tipo_plato1, 'dificultad LIKE'=>$busqueda->dificultad1, 'comensales LIKE'=>$busqueda->comensales1, 'tiempo_elaboracion LIKE'=>$busqueda->tiempo_elaboracion1, 'valoracion LIKE'=>$busqueda->valoracion1]);
				
				$total=$query->count();
				
				foreach ($query as $receta) {
					echo $receta;
				}
				
				//$comments = $this->paginate($commentsTable->find());
				 $this->set('recetas', $this->paginate($query));
		
	}//funcion busquedaver
	
	
	//Funcion para buscar y mostrar la busqueda por filtros de recetas	
	public function busquedafiltros()
	{
	
    $this->Auth->allow();
	
	$this->set('recetas', $this->paginate($this->Recetas));
        $this->set('_serialize', ['recetas']);
		
	$busquedafiltros = $this->Recetas->newEntity();
					
					if ($this->request->is('post')) {
						$busquedafiltros = $this->Recetas->patchEntity($busquedafiltros, $this->request->data);
						
					}
				
				/*Obtenemos los terminos de la busqueda*/
				$busquedafiltros->campo1=$busquedafiltros['campo'];
				
				$busquedafiltros->forma1=$busquedafiltros['forma'];
				
				$ordenmuestra=null;
				$ordenmuestra=$busquedafiltros->campo1;
				$ordenmuestra.=" ";
				$ordenmuestra.=$busquedafiltros->forma1;
				
				
				$query = $this->Recetas->find();
				$query-> select(['id', 'nombre', 'tipo_plato', 'descripcion', 'dificultad', 'comensales', 'tiempo_elaboracion', 'valoracion']);			
				$query->order($ordenmuestra);
				
				
				$total=$query->count();
				
				/*foreach ($query as $receta) {
					echo $receta;
				}*/
				
				//$comments = $this->paginate($commentsTable->find());
				 $this->set('recetas', $this->paginate($query));
		
	}//funcion busqueda
	
	
	
	
	
	
	
	
	
	
	
}

