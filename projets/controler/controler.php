<?php 
require_once("models/bibliotheque.model.php");
if (isset($_GET['view'])){
    if(!(isset($_SESSION['user']))){
        header('location: index.php');
    }
    //$view=$_GET["view"];
    extract($_GET);
   
    if ($view==1){
        $ouvrages=find_alls_ouvrage();
        $data['ouvrages']=$ouvrages;
        render_view('ouvrage',$data);
    }elseif ($view==2){
        $rayons= alls_rayons();
        $data['rayons']=$rayons;
        render_view('rayon',$data);
    }elseif ($view==3){
        $auteurs=alls_auteurs();
        $data['auteurs']=$auteurs;
        render_view('auteur',$data);
    }elseif ($view==4){
            if($filtre==0){
                $prets=find_alls_prets();
            }elseif($filtre==1){
                $prets=find_pret_en_cours($eta);
            }
            $data['prets']=$prets;
            render_view('pret',$data);
    }elseif($view==5){
        session_destroy();
        unset($_SESSION['user']);
        render_view('connexion',[],"base.connexion");
    }
}else{
    render_view('connexion',[],"base.connexion");
}
if(isset($_POST['btnsave'])){
    //$btnsave=$_POST['btnsave'];
    extract($_POST);
    switch ($btnsave) {
        case 'recherche-etat':
            //$data['classes']=$classes;
            //render_view('classe',$data);
            //require_once("views/classe.html.php");
            header("location: index.php?view=4&filtre=1&eta=$etat"); // redirection 
            break;
        case 'connexion':
            $user=find_user_by_login_and_password($login,$password);
            if($user==null){
                header("location: index.php");
            }else{
                $_SESSION['user']=$user;
                header("location: index.php?view=1");
            }
            break;

        default:
            # code...
            break;
    }
}
function find_all_user():array{
    $users=[
        ['nom'=>'Ndoye','prenom'=>'Moustapha','login'=>'moustapha','password'=>'passer'],
        ['nom'=>'Sy','prenom'=>'Abdel','login'=>'sysy','password'=>'passer1']
    ];
    return $users;
}
function find_user_by_login_and_password(string $login,string $password):array | null{
    $users=find_all_user();
    foreach ($users as $user) {
        if($user['login']==$login and $user['password']==$password){
            return $user;
        }
    }
    return null;
}    



function render_view(string $view, array $data=[],string $base="base"):void{
    ob_start();
        extract($data);
        require_once("views/".$view.".html.php");
    $contentView=ob_get_clean();
    require_once("views/".$base.".html.php");
}
?>