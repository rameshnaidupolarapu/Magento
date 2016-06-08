<?php

namespace Ramesh\Connect\Block\Adminhtml\Erpconfig\Edit\Tab;

class General extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface {

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
    \Magento\Backend\Block\Template\Context $context
    , \Magento\Framework\Registry $registry
    , \Magento\Framework\Data\FormFactory $formFactory
    , \Magento\Store\Model\System\Store $systemStore
    , array $data = array()
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm() 
    {
        /* @var $model \Magento\Cms\Model\Page */
        $model = $this->_coreRegistry->registry('rameshconnect_erp');
        $isElementDisabled = false;
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('General')));

        $fieldset->addField('cn_erp_id', 'hidden', array('name' => 'cn_erp_id'));    
        $fieldset->addField(
            'name', 'text', array(
            'name' => 'name',
            'label' => __('Name'),
            'title' => __('Name'),
            'required' => true,
                )
        );
        $fieldset->addField(
            'short_code', 'text', array(
            'name' => 'short_code',
            'label' => __('Short Code'),
            'title' => __('Short Code'),
            'required' => true,
                )
        );
        $fieldset->addField(
            'sort_order','text', array(
            'label' => __('Sort Order'),
            'name' => 'sort_order',
            'title' => __('Sort Order')
                )
        );
        $fieldset->addField(
            'is_active','checkbox',array(
            'label' => __('Is Active'),
            'title' => __('Is Active'),
            'name' => 'is_active',
                )
        );        
        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * 
     * @return type
     */ 
    public function getTabLabel() {
        return __('General');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle() {
        return __('General');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab() {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden() {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId) {
        return $this->_authorization->isAllowed($resourceId);
    }

}
