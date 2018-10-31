<?php

class O2TI_AdvanceApi_Model_Sales_Order_Api_V2 extends Mage_Sales_Model_Order_Api_V2
{
    public function info($orderIncrementId)
    {
        $result = parent::info($orderIncrementId);
        $order = parent::_initOrder($orderIncrementId);
        $result = $this->_getMoipData($result, $order);
        
        return $result;
    }

    public function _getMoipData($result, $order)
    {
        
            $data = $order->getPayment()->getAdditionalData();
            $data = unserialize($data);
          
            $result['payment']['moip_ambiente']             =  $data['ambiente'];
            $result['payment']['moip_pay']                  =  $data['moip_pay_id'];
            $result['payment']['moip_order_id']             =  $data['moip_order_id'];
            $result['payment']['moip_installments']         =  $data['moip_card_installmentCount'];
            $result['payment']['moip_first6']               =  $data['moip_card_first6'];
            $result['payment']['moip_last4']                =  $data['moip_card_last4'];
            $result['payment']['moip_card_brand']           =  $data['moip_card_brand'];
            $result['payment']['moip_expiration_boleto']    =  $data['print_href'];
            $result['payment']['moip_linecode_boleto']      =  $data['line_code'];
            $result['payment']['moip_expiration_trans']     =  $data['moip_transf_expirationDate'];
            $result['payment']['moip_namebank_trans']       =  $data['moip_transf_href'];
            $result['payment']['moip_urlbank_trans']        =  $data['moip_transf_bankName'];
            
                
                
        
        return $result;
    }
}
