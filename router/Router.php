<?php
class Router {
   private $routes = [];
   private $authRoutes = [];
   private $authHandlers = [];

   public function __construct() {}

   public function addRoute($uri, $callback, $method = 'GET', $authRequired = false, $authHandlers = []) {
       $this->routes[$method][$uri] = $callback;
       if ($authRequired) {
           $this->authRoutes[] = $uri;
           $this->authHandlers[$uri] = $authHandlers;
       }
   }

   public function dispatch($uri, $method) {
       $found = false;
       foreach ($this->routes[$method] as $route => $callback) {
           if ($this->matchRoute($route, $uri, $method)) {
               $found = true;
               if ($this->isAuthRoute($route)) {
                   if (!$this->authenticateRoute($route)) {
                       $this->handleAuthenticationFailure();
                       return;
                   }
               }
               $this->executeCallback($callback);
               return;
           }
       }
       $this->handleRouteNotFound();
   }

   private function matchRoute($route, $uri, $method) {
       $pattern = $this->getRoutePattern($route);
       return preg_match($pattern, $uri) && $method === 'POST';
   }

   private function isAuthRoute($route) {
       return in_array($route, $this->authRoutes);
   }

   private function authenticateRoute($route) {
       $handlers = $this->authHandlers[$route];
       foreach ($handlers as $handler) {
           if (!$handler->authenticate()) {
               return false;
           }
       }
       return true;
   }

   private function handleAuthenticationFailure() {
       echo "Authentication failed.";
   }

   private function executeCallback($callback) {
       if (is_callable($callback)) {
           call_user_func($callback);
       } else {
           echo "Error: Callback function is not callable.";
       }
   }

   private function handleRouteNotFound() {
       echo "Error 404: Route not found or method not allowed.";
   }

   private function getRoutePattern($route) {
       $pattern = preg_replace_callback('/{(.*?)}/', function($matches) {
           return "(?P<{$matches[1]}>[\w-]+)";
       }, $route);
       return "~^" . preg_quote($pattern, '~') . "$~";
   }
}
