<?php

namespace Axa\Bundle\WhapiBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * VmRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VmRepository extends EntityRepository
{

    /**
     * Try to update a metadata if it exists or create it if not
     *
     * @param Vm $vm
     * @param $name
     * @param $value
     */
    public function updateOrCreateMetadata(Vm $vm, $name, $value)
    {
        $connexion = $this->getEntityManager()->getConnection();

        $m = $connexion->fetchAssoc(
            'SELECT * FROM vm_metadata WHERE name = ? AND vm_id = ?', array($name, $vm->getId())
        );

        $date = new \DateTime();
        $date = $date->format('Y-m-d H:i:s');
        if (!$m) {
            $connexion->insert('vm_metadata',
                array(
                    'name'=>        $name,
                    'value'=>       $value,
                    'vm_id'=> $vm->getId(),
                    'createdAt'=>   $date,
                    'updatedAt'=>   $date,
                )
            );

            return;
        } elseif ($m["value"] != $value) {
            $connexion->update('vm_metadata', array('value' => $value, 'updatedAt' => $date), array('name' => $name));
        }

        return;
    }
}
