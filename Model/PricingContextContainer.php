<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\PricingBundle\Model;

/**
 * PricingContextContainer implements a data container holding price variables needed for calculation
 *
 * @author Daniel Kucharski <daniel@xerias.be>
 */
class PricingContextContainer implements PricingContextContainerInterface
{
    protected $data;
    protected $entities;
 
    public function PricingContextContainer($data = array())
    {
        $this->data = $data;
        $this->entities = array();
    }

    public function addEntity(&$entity)
    {
        $this->entities[] = $entity;
    }

    public function getEntities()
    {
        return $this->entities;
    }

    public function setEntities($entities)
    {
        $this->entities = $entities;
    }

    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        } elseif ($default) {
            return $default;
        } else {
            return null;
        }
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getContainerData()
    {
        return $this->data;
    }
}