<?php

class Router {
    protected static $A_routes = [];

    public static function get($S_route, $S_controleur, $S_action) : void {
        // var_dump($S_route, $S_controleur, $S_action);
        self::$A_routes['get'][$S_route] = [$S_controleur, $S_action];
    }

     public static function post($S_route, $S_controleur, $S_action) : void {
         //var_dump($S_route, $S_controleur, $S_action);
        self::$A_routes['post'][$S_route] = [$S_controleur, $S_action];
        
    }

    public function resolve($S_requeteURI, $S_requeteMethode):void {
        $S_route = parse_url($S_requeteURI, PHP_URL_PATH);
        $A_urlExplosee = explode('/', $S_route);
        $S_route = '/'.end($A_urlExplosee);
        
        $S_methode = strtolower($S_requeteMethode);
       // var_dump(self::$A_routes);
       // var_dump($S_route, $S_methode);

        if (isset(self::$A_routes[$S_methode][$S_route])) {
            
            [$S_controleur, $S_action] = self::$A_routes[$S_methode][$S_route];
            $this->appelAction($S_controleur, $S_action);
            return;
        } else {
            echo "Page non trouvée";
        }
    }

    private function appelAction($S_controleur, $S_methode): void {
        $S_classeControleurs = $S_controleur;
        echo is_callable($S_controleur);

        if (class_exists($S_classeControleurs)) {
            $S_instanceControleur = new $S_classeControleurs();

            if( method_exists($S_instanceControleur, $S_methode)) {
                $S_instanceControleur->$S_methode();
                return;
            } else {
                echo "Méthode non trouvée";
            }
        } else {
            echo "Contrôleur non trouvé";
        }
    }
}