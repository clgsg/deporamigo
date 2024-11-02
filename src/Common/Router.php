<?php

namespace Common;

class Router {

    private array $routes=[];

    public function add(string $path, array $params = []): void 
    {
        $this->routes[] = [
            "path" => $path,
            "params" => $params
        ];
    }
    /**
     * Loop around $path to look for regular expression. If it matches (preg_match), return return named keys
     */
    public function match(string $path, string $method = null): array|bool
    {   
        $path = urldecode($path);

        # buscar patrón del principio (^) al final ($) del path
        # Se usan 'grupos de captura' con nombre para poder referirnos a ellos
        $pattern= "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#";
        
        foreach ($this->routes as $route){
            /**  Does $path match a regular expression pattern?
             * @return boolean
             * $matches[0] will contain the text that matched the full pattern
            */
            $pattern= "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#";


            if(preg_match($pattern, $path, $matches)){
                # Select only NAMED KEYS of array (not values or numbered keys)
                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);

                # Merge arrays
                $params = array_merge($matches, $route["params"]);
                
                if(array_key_exists("method", $params))

                    if (strtolower($method) !== strtolower($params["method"])){
                        continue;
                    }
                return $params;
            }
        };
 
        return false;
    }

}