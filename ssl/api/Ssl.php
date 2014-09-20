<?php

/**
 * SSL Api of AlternC, used by alternc-api package
 */
class Alternc_Api_Object_Ssl  {
    
  const ERR_INVALID_ARGUMENT = 11151901;

  function __constructor($service) {
    global $ssl,$cuid;
    if (!($service instanceof Alternc_Api_Service)) {
      throw new \Exception("Bad argument: service is not an Alternc_Api_Service", self::ERR_INVALID_ARGUMENT);
    }
    // We store the global $cuid to AlternC legacy classes
    $cuid=$service->token->uid;
    // We use the global $ssl from AlternC legacy classes
    $this->ssl=$ssl;
  }

  /** API Method from legacy class get_list()
   * @param $options a hash with parameters transmitted to legacy call
   *  filter = the kind of ssl certificates to show or not show
   * @return Alternc_Api_Response whose content is an array of hashes containing all corresponding certificates informations
   */
  function getList($options) {
    if (isset($options["filter"]) && is_int($options["filter"])) {
      $filter=intval($options["filter"]);
    } else {
      $filter=null;
    }
    $ssllist=$this->ssl->get_list($filter);
    return new Alternc_Api_Response( array("content" => $ssllist) );
  }


  /** API Method from legacy class new_csr()
   * @param $options a hash with parameters transmitted to legacy call
   *  fqdn = the DNS name to create a CSR to
   * @return Alternc_Api_Response whose content is the CSR ID in the certificate database
   */
  function newCsr($options) {
    if (!isset($options["fqdn"]) || !is_string($options["fqdn"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: FQDN") );
    }
    $certid=$this->ssl->new_csr($options["fqdn"]);
    if ($certid===false) {
      return $this->alterncLegacyErrorManager();
    }
    return new Alternc_Api_Response( array("content" => $certid) );
  }


  /** API Method from legacy class get_certificate()
   * @param $options a hash with parameters transmitted to legacy call
   *  id = the ID of the certificate in the certifiate table to get
   * @return Alternc_Api_Response whose content is a hash with all informations for that certificate
   */
  function getCertificate($options) {
    if (!isset($options["id"]) || !is_int($options["int"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: ID") );
    }
    $certinfo=$this->ssl->get_certificate($options["id"]);
    if ($certinfo===false) {
      return $this->alterncLegacyErrorManager();
    }
    return new Alternc_Api_Response( array("content" => $certinfo) );
  }


  /** API Method from legacy class share()
   * @param $options a hash with parameters transmitted to legacy call
   *  id = the ID of the certificate to share or unshare
   *  action = boolean telling to share(true) or unshare(false) this certificate
   * @return Alternc_Api_Response true.
   */
  function share($options) {
    if (!isset($options["id"]) || !is_int($options["id"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: ID") );
    }
    if (!isset($options["action"]) || !is_bool($options["action"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: ACTION") );
    }
    $isok=$this->ssl->share($options["id"],$options["action"]);
    if ($isok===false) {
      return $this->alterncLegacyErrorManager();
    }
    return new Alternc_Api_Response( array("content" => $isok) );
  }


  /** API Method from legacy class import_cert()
   * @param $options a hash with parameters transmitted to legacy call
   *  key, crt, chain = key and crt (both mandatory) and chain (not mandatory) to import
   * @return Alternc_Api_Response the ID of the newly created certificate in the table.
   */
  function importCert($options) {
    if (!isset($options["key"]) || !is_string($options["key"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: KEY") );
    }
    if (!isset($options["crt"]) || !is_string($options["crt"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: CRT") );
    }
    if (isset($options["chain"])) {
      if (!is_string($options["chain"])) {
	return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Invalid argument: CHAIN") );
      }
    } else {
      $options["chain"]="";
    }

    $certid=$this->ssl->share($options["key"],$options["crt"],$options["chain"]);
    if ($certid===false) {
      return $this->alterncLegacyErrorManager();
    }
    return new Alternc_Api_Response( array("content" => $certid) );
  }


  /** API Method from legacy class finalize()
   * @param $options a hash with parameters transmitted to legacy call
   *  second part of the new_csr() call, finalize a certificate creation
   *  id = ID of the certificate to finalize in the table.
   *  crt = Certificate data
   *  chain = Chained Certificate date (not mandatory)
   * @return Alternc_Api_Response the ID of the updated certificate in the table.
   */
  function finalize($options) {
    if (!isset($options["id"]) || !is_int($options["id"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: ID") );
    }
    if (!isset($options["crt"]) || !is_string($options["crt"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: CRT") );
    }
    if (isset($options["chain"])) {
      if (!is_string($options["chain"])) {
	return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Invalid argument: CHAIN") );
      }
    } else {
      $options["chain"]="";
    }

    $certid=$this->ssl->finalize($options["id"],$options["crt"],$options["chain"]);
    if ($certid===false) {
      return $this->alterncLegacyErrorManager();
    }
    return new Alternc_Api_Response( array("content" => $certid) );
  }


  /** API Method from legacy class alias_add()
   * @param $options a hash with parameters transmitted to legacy call
   *  add the alias 'name' with the content value 'value' in the global apache configuration
   *  @return Alternc_Api_Response true 
   */
  function aliasAdd($options) {
    if (!isset($options["name"]) || !is_string($options["name"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: NAME") );
    }
    if (!isset($options["value"]) || !is_string($options["value"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: VALUE") );
    }

    $isok=$this->ssl->alias_add($options["name"],$options["value"]);
    if ($isok===false) {
      return $this->alterncLegacyErrorManager();
    }
    return new Alternc_Api_Response( array("content" => $isok) );
  }


  /** API Method from legacy class alias_del()
   * @param $options a hash with parameters transmitted to legacy call
   *  del the alias 'name' with the content value 'value' in the global apache configuration
   *  @return Alternc_Api_Response true 
   */
  function aliasDel($options) {
    if (!isset($options["name"]) || !is_string($options["name"])) {
      return new Alternc_Api_Response( array("code" => self::ERR_INVALID_ARGUMENT, "message" => "Missing or invalid argument: NAME") );
    }

    $isok=$this->ssl->alias_del($options["name"]);
    if ($isok===false) {
      return $this->alterncLegacyErrorManager();
    }
    return new Alternc_Api_Response( array("content" => $isok) );
  }




  /** return a proper Alternc_Api_Response from an error class and error string 
   * from AlternC legacy class
   */
  private function alterncLegacyErrorManager() {
    global $err;
    return new Alternc_Api_Response( array("code" => self::ERR_ALTERNC_FUNCTION, "message" => "[".$err->clsid."] ".$err->error) );
  }


} // class Alternc_Api_Object_Ssl