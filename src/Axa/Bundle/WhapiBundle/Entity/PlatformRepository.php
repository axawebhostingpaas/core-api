<?php

namespace Axa\Bundle\WhapiBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PlatformRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlatformRepository extends EntityRepository
{
    /**
     * Persist the Platform
     *
     * @param Platform $platform
     */
    public function persist(Platform $platform)
    {
        $this->_em->persist($platform);
        $this->_em->flush();
    }
}
