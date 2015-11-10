  <?php
  
                require_once("transport.php");
                $api = new Transport();
        $params = array("text" => "Новый оптовик ожидает одобрения!",
                                "source" =>"lady style");
								$tel_mngr=array('+79043498227');
                $send = $api->send($params,$tel_mngr);
				$balance = $api->balance();

                ?>