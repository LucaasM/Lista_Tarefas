<?php

    // Por serem executados no diretorio public HTDOCS, os require foram feitos como se estivessem sendo importados lá;
    require '../../app_lista_tarefas/tarefa_model.php';
    require '../../app_lista_tarefas/tarefa_service.php';
    require '../../app_lista_tarefas/connection.php';

    $action = isset($_GET['action']) ? $_GET['action'] : $action;
    

    if($action == 'insert'){
        $assignment = new Assignment();
        $assignment->__set('assignment', $_POST['new_assignment']);

    

        $connection = new Connection();

        $assignmentService = new AssignmentService($connection, $assignment);
        $assignmentService->insert();   

        header('location: nova_tarefa.php?include=1');

    } else if($action == 'recuperar'){
        $assignment = new Assignment();
        $connection = new Connection();

        $assignmentService = new AssignmentService($connection, $assignment);
        $taks = $assignmentService->to_recover();

    } else if ($action == 'update'){
        $assignment = new Assignment();
        $connection = new Connection();
        
 
        $assignment->__set('assignment', $_POST['assignment'])->__set('id', $_POST['id']);
        

        header('location: todas_tarefas.php?update=1');

      
         
        $assignmentService = new AssignmentService($connection, $assignment);
        $assignmentService->update();
       
        } else if($action == 'delete'){
            $assignment = new Assignment();
            $connection = new Connection();

            $assignment->__set('id', $_GET['id']);

            $assignmentService = new AssignmentService($connection, $assignment);
            $assignmentService->to_remove();
            header('location: todas_tarefas.php?remove=1');
        } else if($action == 'brand_realized'){
            $assignment = new Assignment();
            $connection = new Connection();

            $assignment->__set('id', $_GET['id'])->__set('id_status', 2);

            $assignmentService = new AssignmentService($connection, $assignment);
            $assignmentService->brand_realized();

            header('location: todas_tarefas.php');
        } else if($action == 'pendentes'){
            $assignment = new Assignment();
            $connection = new Connection();


            $assignmentService = new AssignmentService($connection, $assignment);
            $taks_pending = $assignmentService->pending_taks();

          

        
            
           

        }
    





?>