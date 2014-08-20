<?php
namespace Larabook\Core;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use App;

trait CommandBus 
{
    /**
     * Execute trait command
     * @param type $command
     * @return type
     */
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }
    
    /**
     * fetch the command bus
     * @return type
     */
    public function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }
}
?>
