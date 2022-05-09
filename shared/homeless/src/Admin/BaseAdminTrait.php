<?php

namespace App\Admin;

use App\Entity\ContractStatus;
use App\Entity\MenuItem;
use App\Service\MetaService;

trait BaseAdminTrait
{
    public function getMyClientsNoticeCount()
    {
        $em = $this
            ->getConfigurationPool()
            ->getContainer()
            ->get('doctrine.orm.entity_manager');
        if (!$em
            ->getRepository(MenuItem::class)
            ->isEnableCode(MenuItem::CODE_NOTIFICATIONS)) {
            return 0;
        }
        $user = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();

        $filter = ['contractCreatedBy' => $user->getId()];

        $inProcessStatus = $em
            ->getRepository('App:ContractStatus')
            ->findOneBy(['syncId' => ContractStatus::IN_PROCESS]);

        if ($inProcessStatus instanceof ContractStatus) {
            $filter['contractStatus'] = ['value' => [(string)$inProcessStatus->getId()]];
        }

        /**
         * @var $metaService MetaService
         */
        $metaService = $this->getConfigurationPool()->getContainer()->get('app.meta_service');
        $arNoticesId = $em
            ->getRepository('App:Notice')
            ->getMyClientsNoticeHeaderCount($filter, $user, $metaService->isClientFormsEnabled());

        return $arNoticesId;
    }

    /**
     * Получение заголовков оповещений клиентов для текущего пользователя
     *
     * @return mixed
     */
    public function getMyClientsNoticeHeader()
    {
        $em = $this
            ->getConfigurationPool()
            ->getContainer()
            ->get('doctrine.orm.entity_manager');
        if (!$em
            ->getRepository(MenuItem::class)
            ->isEnableCode(MenuItem::CODE_NOTIFICATIONS)) {
            return [];
        }
        $user = $this
            ->getConfigurationPool()
            ->getContainer()
            ->get('security.token_storage')
            ->getToken()
            ->getUser();

        $filter = ['contractCreatedBy' => $user->getId()];

        $inProcessStatus = $this
            ->getConfigurationPool()
            ->getContainer()
            ->get('doctrine.orm.entity_manager')
            ->getRepository('App:ContractStatus')
            ->findOneBy(['syncId' => ContractStatus::IN_PROCESS]);

        if ($inProcessStatus instanceof ContractStatus) {
            $filter['contractStatus'] = ['value' => [(string)$inProcessStatus->getId()]];
        }

        /**
         * @var $metaService MetaService
         */
        $metaService = $this->getConfigurationPool()->getContainer()->get('app.meta_service');
        $arNoticesId = $this
            ->getConfigurationPool()
            ->getContainer()
            ->get('doctrine.orm.entity_manager')
            ->getRepository('App:Notice')
            ->getMyClientsNoticeHeader($filter, $user, $metaService->isClientFormsEnabled());

        return $arNoticesId;
    }
}
