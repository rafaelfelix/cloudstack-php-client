<?php
require_once dirname(__FILE__) . "/BaseCloudStackClient.php";
require_once dirname(__FILE__) . "/CloudStackClientException.php";

class CloudStackClient extends BaseCloudStackClient {
    
    /**
    * Creates a network offering.
    *
    * @param string $displayText the display text of the network offering
    * @param string $guestIpType guest type of the network offering: Shared or Isolate
    *        d
    * @param string $name the name of the network offering
    * @param string $supportedServices services supported by the network offering
    * @param string $trafficType the traffic type for the network offering. Supported 
    *        type in current release is GUEST only
    * @param string $availability the availability of network offering. Default value 
    *        is Optional
    * @param string $conserveMode true if the network offering is IP conserve mode ena
    *        bled
    * @param string $networkRate data transfer rate in megabits per second allowed
    * @param string $serviceCapabilityList desired service capabilities as part of net
    *        work offering
    * @param string $serviceOfferingId the service offering ID used by virtual router 
    *        provider
    * @param string $serviceProviderList provider to service mapping. If not specified
    *        , the provider for the service will be mapped to the default provider on the phy
    *        sical network
    * @param string $specifyIpRanges true if network offering supports specifying ip r
    *        anges; defaulted to false if not specified
    * @param string $specifyVlan true if network offering supports vlans
    * @param string $tags the tags for the network offering.
    */
    
    public function createNetworkOffering($displayText, $guestIpType, $name, $supportedServices, $trafficType, $availability = "", $conserveMode = "", $networkRate = "", $serviceCapabilityList = "", $serviceOfferingId = "", $serviceProviderList = "", $specifyIpRanges = "", $specifyVlan = "", $tags = "") {

        if (empty($displayText)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "displayText"), MISSING_ARGUMENT);
        }

        if (empty($guestIpType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "guestIpType"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($supportedServices)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "supportedServices"), MISSING_ARGUMENT);
        }

        if (empty($trafficType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "trafficType"), MISSING_ARGUMENT);
        }

        return $this->request("createNetworkOffering", array(
            'displaytext' => $displayText,
            'guestiptype' => $guestIpType,
            'name' => $name,
            'supportedservices' => $supportedServices,
            'traffictype' => $trafficType,
            'availability' => $availability,
            'conservemode' => $conserveMode,
            'networkrate' => $networkRate,
            'servicecapabilitylist' => $serviceCapabilityList,
            'serviceofferingid' => $serviceOfferingId,
            'serviceproviderlist' => $serviceProviderList,
            'specifyipranges' => $specifyIpRanges,
            'specifyvlan' => $specifyVlan,
            'tags' => $tags,
        ));
    }
    
    /**
    * Updates a network offering.
    *
    * @param string $availability the availability of network offering. Default value 
    *        is Required for Guest Virtual network offering; Optional for Guest Direct networ
    *        k offering
    * @param string $displayText the display text of the network offering
    * @param string $id the id of the network offering
    * @param string $name the name of the network offering
    * @param string $sortKey sort key of the network offering, integer
    * @param string $state update state for the network offering
    */
    
    public function updateNetworkOffering($availability = "", $displayText = "", $id = "", $name = "", $sortKey = "", $state = "") {

        return $this->request("updateNetworkOffering", array(
            'availability' => $availability,
            'displaytext' => $displayText,
            'id' => $id,
            'name' => $name,
            'sortkey' => $sortKey,
            'state' => $state,
        ));
    }
    
    /**
    * Deletes a network offering.
    *
    * @param string $id the ID of the network offering
    */
    
    public function deleteNetworkOffering($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteNetworkOffering", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists all available network offerings.
    *
    * @param string $availability the availability of network offering. Default value 
    *        is Required
    * @param string $displayText list network offerings by display text
    * @param string $guestIpType list network offerings by guest type: Shared or Isola
    *        ted
    * @param string $id list network offerings by id
    * @param string $isDefault true if need to list only default network offerings. De
    *        fault value is false
    * @param string $isTagged true if offering has tags specified
    * @param string $keyword List by keyword
    * @param string $name list network offerings by name
    * @param string $networkId the ID of the network. Pass this in if you want to see 
    *        the available network offering that a network can be changed to.
    * @param string $page 
    * @param string $pageSize 
    * @param string $sourceNatSupported true if need to list only netwok offerings whe
    *        re source nat is supported, false otherwise
    * @param string $specifyIpRanges true if need to list only network offerings which
    *         support specifying ip ranges
    * @param string $specifyVlan the tags for the network offering.
    * @param string $state list network offerings by state
    * @param string $supportedServices list network offerings supporting certain servi
    *        ces
    * @param string $tags list network offerings by tags
    * @param string $trafficType list by traffic type
    * @param string $zoneId list netowrk offerings available for network creation in s
    *        pecific zone
    * @param string $page Pagination
    */
    
    public function listNetworkOfferings($availability = "", $displayText = "", $guestIpType = "", $id = "", $isDefault = "", $isTagged = "", $keyword = "", $name = "", $networkId = "", $page = "", $pageSize = "", $sourceNatSupported = "", $specifyIpRanges = "", $specifyVlan = "", $state = "", $supportedServices = "", $tags = "", $trafficType = "", $zoneId = "", $page = "") {

        return $this->request("listNetworkOfferings", array(
            'availability' => $availability,
            'displaytext' => $displayText,
            'guestiptype' => $guestIpType,
            'id' => $id,
            'isdefault' => $isDefault,
            'istagged' => $isTagged,
            'keyword' => $keyword,
            'name' => $name,
            'networkid' => $networkId,
            'page' => $page,
            'pagesize' => $pageSize,
            'sourcenatsupported' => $sourceNatSupported,
            'specifyipranges' => $specifyIpRanges,
            'specifyvlan' => $specifyVlan,
            'state' => $state,
            'supportedservices' => $supportedServices,
            'tags' => $tags,
            'traffictype' => $trafficType,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a network
    *
    * @param string $displayText the display text of the network
    * @param string $name the name of the network
    * @param string $networkOfferingId the network offering id
    * @param string $zoneId the Zone ID for the network
    * @param string $account account who will own the network
    * @param string $aclType Access control type; supported values are account and dom
    *        ain. In 3.0 all shared networks should have aclType=Domain, and all Isolated net
    *        works - Account. Account means that only the account owner can use the network, 
    *        domain - all accouns in the domain can use the network
    * @param string $domainId domain ID of the account owning a network
    * @param string $endIp the ending IP address in the network IP range. If not speci
    *        fied, will be defaulted to startIP
    * @param string $gateway the gateway of the network
    * @param string $netmask the netmask of the network
    * @param string $networkDomain network domain
    * @param string $physicalNetworkId the Physical Network ID the network belongs to
    * @param string $projectId an optional project for the ssh key
    * @param string $startIp the beginning IP address in the network IP range
    * @param string $subdomainAccess Defines whether to allow subdomains to use networ
    *        ks dedicated to their parent domain(s). Should be used with aclType=Domain, defa
    *        ulted to allow.subdomain.network.access global config if not specified
    * @param string $vlan the ID or VID of the network
    */
    
    public function createNetwork($displayText, $name, $networkOfferingId, $zoneId, $account = "", $aclType = "", $domainId = "", $endIp = "", $gateway = "", $netmask = "", $networkDomain = "", $physicalNetworkId = "", $projectId = "", $startIp = "", $subdomainAccess = "", $vlan = "") {

        if (empty($displayText)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "displayText"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($networkOfferingId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "networkOfferingId"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("createNetwork", array(
            'displaytext' => $displayText,
            'name' => $name,
            'networkofferingid' => $networkOfferingId,
            'zoneid' => $zoneId,
            'account' => $account,
            'acltype' => $aclType,
            'domainid' => $domainId,
            'endip' => $endIp,
            'gateway' => $gateway,
            'netmask' => $netmask,
            'networkdomain' => $networkDomain,
            'physicalnetworkid' => $physicalNetworkId,
            'projectid' => $projectId,
            'startip' => $startIp,
            'subdomainaccess' => $subdomainAccess,
            'vlan' => $vlan,
        ));
    }
    
    /**
    * Deletes a network
    *
    * @param string $id the ID of the network
    */
    
    public function deleteNetwork($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteNetwork", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists all available networks.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $aclType list networks by ACL (access control list) type. Supporte
    *        d values are Account and Domain
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id list networks by id
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $isSystem true if network is system, false otherwise
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $physicalNetworkId list networks by physical network id
    * @param string $projectId list firewall rules by project
    * @param string $restartRequired list network offerings by restartRequired option
    * @param string $specifyIpRanges true if need to list only networks which support 
    *        specifying ip ranges
    * @param string $supportedServices list network offerings supporting certain servi
    *        ces
    * @param string $trafficType type of the traffic
    * @param string $type the type of the network. Supported values are: Isolated and 
    *        Shared
    * @param string $zoneId the Zone ID of the network
    * @param string $page Pagination
    */
    
    public function listNetworks($account = "", $aclType = "", $domainId = "", $id = "", $isRecursive = "", $isSystem = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $physicalNetworkId = "", $projectId = "", $restartRequired = "", $specifyIpRanges = "", $supportedServices = "", $trafficType = "", $type = "", $zoneId = "", $page = "") {

        return $this->request("listNetworks", array(
            'account' => $account,
            'acltype' => $aclType,
            'domainid' => $domainId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'issystem' => $isSystem,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'physicalnetworkid' => $physicalNetworkId,
            'projectid' => $projectId,
            'restartrequired' => $restartRequired,
            'specifyipranges' => $specifyIpRanges,
            'supportedservices' => $supportedServices,
            'traffictype' => $trafficType,
            'type' => $type,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Restarts the network; includes 1) restarting network elements - virtual routers, dhcp servers 2) reapplying all public ips 3) reapplying loadBalancing/portForwarding rules
    *
    * @param string $id The id of the network to restart.
    * @param string $cleanup If cleanup old network elements
    */
    
    public function restartNetwork($id, $cleanup = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("restartNetwork", array(
            'id' => $id,
            'cleanup' => $cleanup,
        ));
    }
    
    /**
    * Updates a network
    *
    * @param string $id the ID of the network
    * @param string $changeCidr Force update even if cidr type is different
    * @param string $displayText the new display text for the network
    * @param string $name the new name for the network
    * @param string $networkDomain network domain
    * @param string $networkOfferingId network offering ID
    */
    
    public function updateNetwork($id, $changeCidr = "", $displayText = "", $name = "", $networkDomain = "", $networkOfferingId = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateNetwork", array(
            'id' => $id,
            'changecidr' => $changeCidr,
            'displaytext' => $displayText,
            'name' => $name,
            'networkdomain' => $networkDomain,
            'networkofferingid' => $networkOfferingId,
        ));
    }
    
    /**
    * Creates a physical network
    *
    * @param string $name the name of the physical network
    * @param string $zoneId the Zone ID for the physical network
    * @param string $broadcastDomainRange the broadcast domain range for the physical 
    *        network[Pod or Zone]. In Acton release it can be Zone only in Advance zone, and 
    *        Pod in Basic
    * @param string $domainId domain ID of the account owning a physical network
    * @param string $isolationMethods the isolation method for the physical network[VL
    *        AN/L3/GRE]
    * @param string $networkSpeed the speed for the physical network[1G/10G]
    * @param string $tags Tag the physical network
    * @param string $vlan the VLAN for the physical network
    */
    
    public function createPhysicalNetwork($name, $zoneId, $broadcastDomainRange = "", $domainId = "", $isolationMethods = "", $networkSpeed = "", $tags = "", $vlan = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("createPhysicalNetwork", array(
            'name' => $name,
            'zoneid' => $zoneId,
            'broadcastdomainrange' => $broadcastDomainRange,
            'domainid' => $domainId,
            'isolationmethods' => $isolationMethods,
            'networkspeed' => $networkSpeed,
            'tags' => $tags,
            'vlan' => $vlan,
        ));
    }
    
    /**
    * Deletes a Physical Network.
    *
    * @param string $id the ID of the Physical network
    */
    
    public function deletePhysicalNetwork($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deletePhysicalNetwork", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists physical networks
    *
    * @param string $id list physical network by id
    * @param string $keyword List by keyword
    * @param string $name search by name
    * @param string $page 
    * @param string $pageSize 
    * @param string $zoneId the Zone ID for the physical network
    * @param string $page Pagination
    */
    
    public function listPhysicalNetworks($id = "", $keyword = "", $name = "", $page = "", $pageSize = "", $zoneId = "", $page = "") {

        return $this->request("listPhysicalNetworks", array(
            'id' => $id,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Updates a physical network
    *
    * @param string $id physical network id
    * @param string $networkSpeed the speed for the physical network[1G/10G]
    * @param string $state Enabled/Disabled
    * @param string $tags Tag the physical network
    * @param string $vlan the VLAN for the physical network
    */
    
    public function updatePhysicalNetwork($id, $networkSpeed = "", $state = "", $tags = "", $vlan = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updatePhysicalNetwork", array(
            'id' => $id,
            'networkspeed' => $networkSpeed,
            'state' => $state,
            'tags' => $tags,
            'vlan' => $vlan,
        ));
    }
    
    /**
    * Lists all network services provided by CloudStack or for the given Provider.
    *
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $provider network service provider name
    * @param string $service network service name to list providers and capabilities o
    *        f
    * @param string $page Pagination
    */
    
    public function listSupportedNetworkServices($keyword = "", $page = "", $pageSize = "", $provider = "", $service = "", $page = "") {

        return $this->request("listSupportedNetworkServices", array(
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'provider' => $provider,
            'service' => $service,
            'page' => $page,
        ));
    }
    
    /**
    * Adds a network serviceProvider to a physical network
    *
    * @param string $name the name for the physical network service provider
    * @param string $physicalNetworkId the Physical Network ID to add the provider to
    * @param string $destinationPhysicalNetworkId the destination Physical Network ID 
    *        to bridge to
    * @param string $serviceList the list of services to be enabled for this physical 
    *        network service provider
    */
    
    public function addNetworkServiceProvider($name, $physicalNetworkId, $destinationPhysicalNetworkId = "", $serviceList = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($physicalNetworkId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "physicalNetworkId"), MISSING_ARGUMENT);
        }

        return $this->request("addNetworkServiceProvider", array(
            'name' => $name,
            'physicalnetworkid' => $physicalNetworkId,
            'destinationphysicalnetworkid' => $destinationPhysicalNetworkId,
            'servicelist' => $serviceList,
        ));
    }
    
    /**
    * Deletes a Network Service Provider.
    *
    * @param string $id the ID of the network service provider
    */
    
    public function deleteNetworkServiceProvider($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteNetworkServiceProvider", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists network serviceproviders for a given physical network.
    *
    * @param string $keyword List by keyword
    * @param string $name list providers by name
    * @param string $page 
    * @param string $pageSize 
    * @param string $physicalNetworkId the Physical Network ID
    * @param string $state list providers by state
    * @param string $page Pagination
    */
    
    public function listNetworkServiceProviders($keyword = "", $name = "", $page = "", $pageSize = "", $physicalNetworkId = "", $state = "", $page = "") {

        return $this->request("listNetworkServiceProviders", array(
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'physicalnetworkid' => $physicalNetworkId,
            'state' => $state,
            'page' => $page,
        ));
    }
    
    /**
    * Updates a network serviceProvider of a physical network
    *
    * @param string $id network service provider id
    * @param string $serviceList the list of services to be enabled for this physical 
    *        network service provider
    * @param string $state Enabled/Disabled/Shutdown the physical network service prov
    *        ider
    */
    
    public function updateNetworkServiceProvider($id, $serviceList = "", $state = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateNetworkServiceProvider", array(
            'id' => $id,
            'servicelist' => $serviceList,
            'state' => $state,
        ));
    }
    
    /**
    * Creates a Storage network IP range.
    *
    * @param string $gateway the gateway for storage network
    * @param string $netmask the netmask for storage network
    * @param string $podId UUID of pod where the ip range belongs to
    * @param string $startIp the beginning IP address
    * @param string $endIp the ending IP address
    * @param string $vlan Optional. The vlan the ip range sits on, default to Null whe
    *        n it is not specificed which means you network is not on any Vlan. This is mainl
    *        y for Vmware as other hypervisors can directly reterive bridge from pyhsical net
    *        work traffic type table
    */
    
    public function createStorageNetworkIpRange($gateway, $netmask, $podId, $startIp, $endIp = "", $vlan = "") {

        if (empty($gateway)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "gateway"), MISSING_ARGUMENT);
        }

        if (empty($netmask)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "netmask"), MISSING_ARGUMENT);
        }

        if (empty($podId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "podId"), MISSING_ARGUMENT);
        }

        if (empty($startIp)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "startIp"), MISSING_ARGUMENT);
        }

        return $this->request("createStorageNetworkIpRange", array(
            'gateway' => $gateway,
            'netmask' => $netmask,
            'podid' => $podId,
            'startip' => $startIp,
            'endip' => $endIp,
            'vlan' => $vlan,
        ));
    }
    
    /**
    * Deletes a storage network IP Range.
    *
    * @param string $id the uuid of the storage network ip range
    */
    
    public function deleteStorageNetworkIpRange($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteStorageNetworkIpRange", array(
            'id' => $id,
        ));
    }
    
    /**
    * List a storage network IP range.
    *
    * @param string $id optional parameter. Storaget network IP range uuid, if specici
    *        ed, using it to search the range.
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $podId optional parameter. Pod uuid, if specicied and range uuid i
    *        s absent, using it to search the range.
    * @param string $zoneId optional parameter. Zone uuid, if specicied and both pod u
    *        uid and range uuid are absent, using it to search the range.
    * @param string $page Pagination
    */
    
    public function listStorageNetworkIpRange($id = "", $keyword = "", $page = "", $pageSize = "", $podId = "", $zoneId = "", $page = "") {

        return $this->request("listStorageNetworkIpRange", array(
            'id' => $id,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'podid' => $podId,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Update a Storage network IP range, only allowed when no IPs in this range have been allocated.
    *
    * @param string $id UUID of storage network ip range
    * @param string $endIp the ending IP address
    * @param string $netmask the netmask for storage network
    * @param string $startIp the beginning IP address
    * @param string $vlan Optional. the vlan the ip range sits on
    */
    
    public function updateStorageNetworkIpRange($id, $endIp = "", $netmask = "", $startIp = "", $vlan = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateStorageNetworkIpRange", array(
            'id' => $id,
            'endip' => $endIp,
            'netmask' => $netmask,
            'startip' => $startIp,
            'vlan' => $vlan,
        ));
    }
    
    /**
    * Adds a network device of one of the following types: ExternalDhcp, ExternalFirewall, ExternalLoadBalancer, PxeServer
    *
    * @param string $networkDeviceParameterList parameters for network device
    * @param string $networkDeviceType Network device type, now supports ExternalDhcp,
    *         PxeServer, NetscalerMPXLoadBalancer, NetscalerVPXLoadBalancer, NetscalerSDXLoad
    *        Balancer, F5BigIpLoadBalancer, JuniperSRXFirewall
    */
    
    public function addNetworkDevice($networkDeviceParameterList = "", $networkDeviceType = "") {

        return $this->request("addNetworkDevice", array(
            'networkdeviceparameterlist' => $networkDeviceParameterList,
            'networkdevicetype' => $networkDeviceType,
        ));
    }
    
    /**
    * List network devices
    *
    * @param string $keyword List by keyword
    * @param string $networkDeviceParameterList parameters for network device
    * @param string $networkDeviceType Network device type, now supports ExternalDhcp,
    *         PxeServer, NetscalerMPXLoadBalancer, NetscalerVPXLoadBalancer, NetscalerSDXLoad
    *        Balancer, F5BigIpLoadBalancer, JuniperSRXFirewall
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listNetworkDevice($keyword = "", $networkDeviceParameterList = "", $networkDeviceType = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listNetworkDevice", array(
            'keyword' => $keyword,
            'networkdeviceparameterlist' => $networkDeviceParameterList,
            'networkdevicetype' => $networkDeviceType,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Deletes network device.
    *
    * @param string $id Id of network device to delete
    */
    
    public function deleteNetworkDevice($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteNetworkDevice", array(
            'id' => $id,
        ));
    }
    
    /**
    * lists network that are using a F5 load balancer device
    *
    * @param string $lbDeviceId f5 load balancer device ID
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listF5LoadBalancerNetworks($lbDeviceId, $keyword = "", $page = "", $pageSize = "", $page = "") {

        if (empty($lbDeviceId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lbDeviceId"), MISSING_ARGUMENT);
        }

        return $this->request("listF5LoadBalancerNetworks", array(
            'lbdeviceid' => $lbDeviceId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * lists network that are using SRX firewall device
    *
    * @param string $lbDeviceId netscaler load balancer device ID
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listSrxFirewallNetworks($lbDeviceId, $keyword = "", $page = "", $pageSize = "", $page = "") {

        if (empty($lbDeviceId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lbDeviceId"), MISSING_ARGUMENT);
        }

        return $this->request("listSrxFirewallNetworks", array(
            'lbdeviceid' => $lbDeviceId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * lists network that are using a netscaler load balancer device
    *
    * @param string $lbDeviceId netscaler load balancer device ID
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listNetscalerLoadBalancerNetworks($lbDeviceId, $keyword = "", $page = "", $pageSize = "", $page = "") {

        if (empty($lbDeviceId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lbDeviceId"), MISSING_ARGUMENT);
        }

        return $this->request("listNetscalerLoadBalancerNetworks", array(
            'lbdeviceid' => $lbDeviceId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a load balancer rule
    *
    * @param string $algorithm load balancer algorithm (source, roundrobin, leastconn)
    *        
    * @param string $name name of the load balancer rule
    * @param string $privatePort the private port of the private ip address/virtual ma
    *        chine where the network traffic will be load balanced to
    * @param string $publicPort the public port from where the network traffic will be
    *         load balanced from
    * @param string $account the account associated with the load balancer. Must be us
    *        ed with the domainId parameter.
    * @param string $cidrList the cidr list to forward traffic from
    * @param string $description the description of the load balancer rule
    * @param string $domainId the domain ID associated with the load balancer
    * @param string $networkId The guest network this rule will be created for
    * @param string $openFirewall if true, firewall rule for source/end pubic port is 
    *        automatically created; if false - firewall rule has to be created explicitely. H
    *        as value true by default
    * @param string $publicIpId public ip address id from where the network traffic wi
    *        ll be load balanced from
    * @param string $zoneId zone where the load balancer is going to be created. This 
    *        parameter is required when LB service provider is ElasticLoadBalancerVm
    */
    
    public function createLoadBalancerRule($algorithm, $name, $privatePort, $publicPort, $account = "", $cidrList = "", $description = "", $domainId = "", $networkId = "", $openFirewall = "", $publicIpId = "", $zoneId = "") {

        if (empty($algorithm)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "algorithm"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($privatePort)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "privatePort"), MISSING_ARGUMENT);
        }

        if (empty($publicPort)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "publicPort"), MISSING_ARGUMENT);
        }

        return $this->request("createLoadBalancerRule", array(
            'algorithm' => $algorithm,
            'name' => $name,
            'privateport' => $privatePort,
            'publicport' => $publicPort,
            'account' => $account,
            'cidrlist' => $cidrList,
            'description' => $description,
            'domainid' => $domainId,
            'networkid' => $networkId,
            'openfirewall' => $openFirewall,
            'publicipid' => $publicIpId,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Deletes a load balancer rule.
    *
    * @param string $id the ID of the load balancer rule
    */
    
    public function deleteLoadBalancerRule($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteLoadBalancerRule", array(
            'id' => $id,
        ));
    }
    
    /**
    * Removes a virtual machine or a list of virtual machines from a load balancer rule.
    *
    * @param string $id The ID of the load balancer rule
    * @param string $virtualMachineIds the list of IDs of the virtual machines that ar
    *        e being removed from the load balancer rule (i.e. virtualMachineIds=1,2,3)
    */
    
    public function removeFromLoadBalancerRule($id, $virtualMachineIds) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($virtualMachineIds)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineIds"), MISSING_ARGUMENT);
        }

        return $this->request("removeFromLoadBalancerRule", array(
            'id' => $id,
            'virtualmachineids' => $virtualMachineIds,
        ));
    }
    
    /**
    * Assigns virtual machine or a list of virtual machines to a load balancer rule.
    *
    * @param string $id the ID of the load balancer rule
    * @param string $virtualMachineIds the list of IDs of the virtual machine that are
    *         being assigned to the load balancer rule(i.e. virtualMachineIds=1,2,3)
    */
    
    public function assignToLoadBalancerRule($id, $virtualMachineIds) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($virtualMachineIds)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineIds"), MISSING_ARGUMENT);
        }

        return $this->request("assignToLoadBalancerRule", array(
            'id' => $id,
            'virtualmachineids' => $virtualMachineIds,
        ));
    }
    
    /**
    * Creates a Load Balancer stickiness policy
    *
    * @param string $lbRuleId the ID of the load balancer rule
    * @param string $methodName name of the LB Stickiness policy method, possible valu
    *        es can be obtained from ListNetworks API
    * @param string $name name of the LB Stickiness policy
    * @param string $description the description of the LB Stickiness policy
    * @param string $param param list. Example: param[0].name=cookiename&amp;amp;param
    *        [0].value=LBCookie
    */
    
    public function createLBStickinessPolicy($lbRuleId, $methodName, $name, $description = "", $param = "") {

        if (empty($lbRuleId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lbRuleId"), MISSING_ARGUMENT);
        }

        if (empty($methodName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "methodName"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createLBStickinessPolicy", array(
            'lbruleid' => $lbRuleId,
            'methodname' => $methodName,
            'name' => $name,
            'description' => $description,
            'param' => $param,
        ));
    }
    
    /**
    * Deletes a LB stickiness policy.
    *
    * @param string $id the ID of the LB stickiness policy
    */
    
    public function deleteLBStickinessPolicy($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteLBStickinessPolicy", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists load balancer rules.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id the ID of the load balancer rule
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name the name of the load balancer rule
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $publicIpId the public IP address id of the load balancer rule
    * @param string $virtualMachineId the ID of the virtual machine of the load balanc
    *        er rule
    * @param string $zoneId the availability zone ID
    * @param string $page Pagination
    */
    
    public function listLoadBalancerRules($account = "", $domainId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $projectId = "", $publicIpId = "", $virtualMachineId = "", $zoneId = "", $page = "") {

        return $this->request("listLoadBalancerRules", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'publicipid' => $publicIpId,
            'virtualmachineid' => $virtualMachineId,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Lists LBStickiness policies.
    *
    * @param string $lbRuleId the ID of the load balancer rule
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listLBStickinessPolicies($lbRuleId, $keyword = "", $page = "", $pageSize = "", $page = "") {

        if (empty($lbRuleId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lbRuleId"), MISSING_ARGUMENT);
        }

        return $this->request("listLBStickinessPolicies", array(
            'lbruleid' => $lbRuleId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * List all virtual machine instances that are assigned to a load balancer rule.
    *
    * @param string $id the ID of the load balancer rule
    * @param string $applied true if listing all virtual machines currently applied to
    *         the load balancer rule; default is true
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listLoadBalancerRuleInstances($id, $applied = "", $keyword = "", $page = "", $pageSize = "", $page = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("listLoadBalancerRuleInstances", array(
            'id' => $id,
            'applied' => $applied,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Updates load balancer
    *
    * @param string $id the id of the load balancer rule to update
    * @param string $algorithm load balancer algorithm (source, roundrobin, leastconn)
    *        
    * @param string $description the description of the load balancer rule
    * @param string $name the name of the load balancer rule
    */
    
    public function updateLoadBalancerRule($id, $algorithm = "", $description = "", $name = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateLoadBalancerRule", array(
            'id' => $id,
            'algorithm' => $algorithm,
            'description' => $description,
            'name' => $name,
        ));
    }
    
    /**
    * Adds a F5 BigIP load balancer device
    *
    * @param string $networkDeviceType supports only F5BigIpLoadBalancer
    * @param string $password Credentials to reach F5 BigIP load balancer device
    * @param string $physicalNetworkId the Physical Network ID
    * @param string $url URL of the F5 load balancer appliance.
    * @param string $userName Credentials to reach F5 BigIP load balancer device
    */
    
    public function addF5LoadBalancer($networkDeviceType, $password, $physicalNetworkId, $url, $userName) {

        if (empty($networkDeviceType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "networkDeviceType"), MISSING_ARGUMENT);
        }

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($physicalNetworkId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "physicalNetworkId"), MISSING_ARGUMENT);
        }

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        return $this->request("addF5LoadBalancer", array(
            'networkdevicetype' => $networkDeviceType,
            'password' => $password,
            'physicalnetworkid' => $physicalNetworkId,
            'url' => $url,
            'username' => $userName,
        ));
    }
    
    /**
    * configures a F5 load balancer device
    *
    * @param string $lbDeviceId F5 load balancer device ID
    * @param string $lbDeviceCapacity capacity of the device, Capacity will be interpr
    *        eted as number of networks device can handle
    */
    
    public function configureF5LoadBalancer($lbDeviceId, $lbDeviceCapacity = "") {

        if (empty($lbDeviceId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lbDeviceId"), MISSING_ARGUMENT);
        }

        return $this->request("configureF5LoadBalancer", array(
            'lbdeviceid' => $lbDeviceId,
            'lbdevicecapacity' => $lbDeviceCapacity,
        ));
    }
    
    /**
    * delete a F5 load balancer device
    *
    * @param string $lbDeviceId netscaler load balancer device ID
    */
    
    public function deleteF5LoadBalancer($lbDeviceId) {

        if (empty($lbDeviceId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lbDeviceId"), MISSING_ARGUMENT);
        }

        return $this->request("deleteF5LoadBalancer", array(
            'lbdeviceid' => $lbDeviceId,
        ));
    }
    
    /**
    * lists F5 load balancer devices
    *
    * @param string $keyword List by keyword
    * @param string $lbDeviceId f5 load balancer device ID
    * @param string $page 
    * @param string $pageSize 
    * @param string $physicalNetworkId the Physical Network ID
    * @param string $page Pagination
    */
    
    public function listF5LoadBalancers($keyword = "", $lbDeviceId = "", $page = "", $pageSize = "", $physicalNetworkId = "", $page = "") {

        return $this->request("listF5LoadBalancers", array(
            'keyword' => $keyword,
            'lbdeviceid' => $lbDeviceId,
            'page' => $page,
            'pagesize' => $pageSize,
            'physicalnetworkid' => $physicalNetworkId,
            'page' => $page,
        ));
    }
    
    /**
    * Adds a netscaler load balancer device
    *
    * @param string $networkDeviceType Netscaler device type supports NetscalerMPXLoad
    *        Balancer, NetscalerVPXLoadBalancer, NetscalerSDXLoadBalancer
    * @param string $password Credentials to reach netscaler load balancer device
    * @param string $physicalNetworkId the Physical Network ID
    * @param string $url URL of the netscaler load balancer appliance.
    * @param string $userName Credentials to reach netscaler load balancer device
    */
    
    public function addNetscalerLoadBalancer($networkDeviceType, $password, $physicalNetworkId, $url, $userName) {

        if (empty($networkDeviceType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "networkDeviceType"), MISSING_ARGUMENT);
        }

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($physicalNetworkId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "physicalNetworkId"), MISSING_ARGUMENT);
        }

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        return $this->request("addNetscalerLoadBalancer", array(
            'networkdevicetype' => $networkDeviceType,
            'password' => $password,
            'physicalnetworkid' => $physicalNetworkId,
            'url' => $url,
            'username' => $userName,
        ));
    }
    
    /**
    * delete a netscaler load balancer device
    *
    * @param string $lbDeviceId netscaler load balancer device ID
    */
    
    public function deleteNetscalerLoadBalancer($lbDeviceId) {

        if (empty($lbDeviceId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lbDeviceId"), MISSING_ARGUMENT);
        }

        return $this->request("deleteNetscalerLoadBalancer", array(
            'lbdeviceid' => $lbDeviceId,
        ));
    }
    
    /**
    * configures a netscaler load balancer device
    *
    * @param string $lbDeviceId Netscaler load balancer device ID
    * @param string $inline true if netscaler load balancer is intended to be used in 
    *        in-line with firewall, false if netscaler load balancer will side-by-side with f
    *        irewall
    * @param string $lbDeviceCapacity capacity of the device, Capacity will be interpr
    *        eted as number of networks device can handle
    * @param string $lbDeviceDedicated true if this netscaler device to dedicated for 
    *        a account, false if the netscaler device will be shared by multiple accounts
    */
    
    public function configureNetscalerLoadBalancer($lbDeviceId, $inline = "", $lbDeviceCapacity = "", $lbDeviceDedicated = "") {

        if (empty($lbDeviceId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lbDeviceId"), MISSING_ARGUMENT);
        }

        return $this->request("configureNetscalerLoadBalancer", array(
            'lbdeviceid' => $lbDeviceId,
            'inline' => $inline,
            'lbdevicecapacity' => $lbDeviceCapacity,
            'lbdevicededicated' => $lbDeviceDedicated,
        ));
    }
    
    /**
    * lists netscaler load balancer devices
    *
    * @param string $keyword List by keyword
    * @param string $lbDeviceId netscaler load balancer device ID
    * @param string $page 
    * @param string $pageSize 
    * @param string $physicalNetworkId the Physical Network ID
    * @param string $page Pagination
    */
    
    public function listNetscalerLoadBalancers($keyword = "", $lbDeviceId = "", $page = "", $pageSize = "", $physicalNetworkId = "", $page = "") {

        return $this->request("listNetscalerLoadBalancers", array(
            'keyword' => $keyword,
            'lbdeviceid' => $lbDeviceId,
            'page' => $page,
            'pagesize' => $pageSize,
            'physicalnetworkid' => $physicalNetworkId,
            'page' => $page,
        ));
    }
    
    /**
    * Creates and automatically starts a virtual machine based on a service offering, disk offering, and template.
    *
    * @param string $serviceOfferingId the ID of the service offering for the virtual 
    *        machine
    * @param string $templateId the ID of the template for the virtual machine
    * @param string $zoneId availability zone for the virtual machine
    * @param string $account an optional account for the virtual machine. Must be used
    *         with domainId.
    * @param string $diskOfferingId the ID of the disk offering for the virtual machin
    *        e. If the template is of ISO format, the diskOfferingId is for the root disk vol
    *        ume. Otherwise this parameter is used to indicate the offering for the data disk
    *         volume. If the templateId parameter passed is from a Template object, the diskO
    *        fferingId refers to a DATA Disk Volume created. If the templateId parameter pass
    *        ed is from an ISO object, the diskOfferingId refers to a ROOT Disk Volume create
    *        d.
    * @param string $displayName an optional user generated name for the virtual machi
    *        ne
    * @param string $domainId an optional domainId for the virtual machine. If the acc
    *        ount parameter is used, domainId must also be used.
    * @param string $group an optional group for the virtual machine
    * @param string $hostId destination Host ID to deploy the VM to - parameter availa
    *        ble for root admin only
    * @param string $hypervisor the hypervisor on which to deploy the virtual machine
    * @param string $ipAddress the ip address for default vm&#039;s network
    * @param string $ipToNetworkList ip to network mapping. Can&#039;t be specified wi
    *        th networkIds parameter. Example: iptonetworklist[0].ip=10.10.10.11&amp;amp;ipto
    *        networklist[0].networkid=204 - requests to use ip 10.10.10.11 in network id=204
    * @param string $keyboard an optional keyboard device type for the virtual machine
    *        . valid value can be one of de,de-ch,es,fi,fr,fr-be,fr-ch,is,it,jp,nl-be,no,pt,u
    *        k,us
    * @param string $keyPair name of the ssh key pair used to login to the virtual mac
    *        hine
    * @param string $name host name for the virtual machine
    * @param string $networkIds list of network ids used by virtual machine. Can&#039;
    *        t be specified with ipToNetworkList parameter
    * @param string $projectId Deploy vm for the project
    * @param string $securityGroupIds comma separated list of security groups id that 
    *        going to be applied to the virtual machine. Should be passed only when vm is cre
    *        ated from a zone with Basic Network support. Mutually exclusive with securitygro
    *        upnames parameter
    * @param string $securityGroupNames comma separated list of security groups names 
    *        that going to be applied to the virtual machine. Should be passed only when vm i
    *        s created from a zone with Basic Network support. Mutually exclusive with securi
    *        tygroupids parameter
    * @param string $size the arbitrary size for the DATADISK volume. Mutually exclusi
    *        ve with diskOfferingId
    * @param string $userData an optional binary data that can be sent to the virtual 
    *        machine upon a successful deployment. This binary data must be base64 encoded be
    *        fore adding it to the request. Currently only HTTP GET is supported. Using HTTP 
    *        GET (via querystring), you can send up to 2KB of data after base64 encoding.
    */
    
    public function deployVirtualMachine($serviceOfferingId, $templateId, $zoneId, $account = "", $diskOfferingId = "", $displayName = "", $domainId = "", $group = "", $hostId = "", $hypervisor = "", $ipAddress = "", $ipToNetworkList = "", $keyboard = "", $keyPair = "", $name = "", $networkIds = "", $projectId = "", $securityGroupIds = "", $securityGroupNames = "", $size = "", $userData = "") {

        if (empty($serviceOfferingId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "serviceOfferingId"), MISSING_ARGUMENT);
        }

        if (empty($templateId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "templateId"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("deployVirtualMachine", array(
            'serviceofferingid' => $serviceOfferingId,
            'templateid' => $templateId,
            'zoneid' => $zoneId,
            'account' => $account,
            'diskofferingid' => $diskOfferingId,
            'displayname' => $displayName,
            'domainid' => $domainId,
            'group' => $group,
            'hostid' => $hostId,
            'hypervisor' => $hypervisor,
            'ipaddress' => $ipAddress,
            'iptonetworklist' => $ipToNetworkList,
            'keyboard' => $keyboard,
            'keypair' => $keyPair,
            'name' => $name,
            'networkids' => $networkIds,
            'projectid' => $projectId,
            'securitygroupids' => $securityGroupIds,
            'securitygroupnames' => $securityGroupNames,
            'size' => $size,
            'userdata' => $userData,
        ));
    }
    
    /**
    * Destroys a virtual machine. Once destroyed, only the administrator can recover it.
    *
    * @param string $id The ID of the virtual machine
    */
    
    public function destroyVirtualMachine($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("destroyVirtualMachine", array(
            'id' => $id,
        ));
    }
    
    /**
    * Reboots a virtual machine.
    *
    * @param string $id The ID of the virtual machine
    */
    
    public function rebootVirtualMachine($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("rebootVirtualMachine", array(
            'id' => $id,
        ));
    }
    
    /**
    * Starts a virtual machine.
    *
    * @param string $id The ID of the virtual machine
    */
    
    public function startVirtualMachine($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("startVirtualMachine", array(
            'id' => $id,
        ));
    }
    
    /**
    * Stops a virtual machine.
    *
    * @param string $id The ID of the virtual machine
    * @param string $forced Force stop the VM.  The caller knows the VM is stopped.
    */
    
    public function stopVirtualMachine($id, $forced = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("stopVirtualMachine", array(
            'id' => $id,
            'forced' => $forced,
        ));
    }
    
    /**
    * Resets the password for virtual machine. The virtual machine must be in a "Stopped" state and the template must already support this feature for this command to take effect. [async]
    *
    * @param string $id The ID of the virtual machine
    */
    
    public function resetPasswordForVirtualMachine($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("resetPasswordForVirtualMachine", array(
            'id' => $id,
        ));
    }
    
    /**
    * Changes the service offering for a virtual machine. The virtual machine must be in a "Stopped" state for this command to take effect.
    *
    * @param string $id The ID of the virtual machine
    * @param string $serviceOfferingId the service offering ID to apply to the virtual
    *         machine
    */
    
    public function changeServiceForVirtualMachine($id, $serviceOfferingId) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($serviceOfferingId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "serviceOfferingId"), MISSING_ARGUMENT);
        }

        return $this->request("changeServiceForVirtualMachine", array(
            'id' => $id,
            'serviceofferingid' => $serviceOfferingId,
        ));
    }
    
    /**
    * Updates parameters of a virtual machine.
    *
    * @param string $id The ID of the virtual machine
    * @param string $displayName user generated name
    * @param string $group group of the virtual machine
    * @param string $haEnable true if high-availability is enabled for the virtual mac
    *        hine, false otherwise
    * @param string $osTypeId the ID of the OS type that best represents this VM.
    * @param string $userData an optional binary data that can be sent to the virtual 
    *        machine upon a successful deployment. This binary data must be base64 encoded be
    *        fore adding it to the request. Currently only HTTP GET is supported. Using HTTP 
    *        GET (via querystring), you can send up to 2KB of data after base64 encoding.
    */
    
    public function updateVirtualMachine($id, $displayName = "", $group = "", $haEnable = "", $osTypeId = "", $userData = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateVirtualMachine", array(
            'id' => $id,
            'displayname' => $displayName,
            'group' => $group,
            'haenable' => $haEnable,
            'ostypeid' => $osTypeId,
            'userdata' => $userData,
        ));
    }
    
    /**
    * Recovers a virtual machine.
    *
    * @param string $id The ID of the virtual machine
    */
    
    public function recoverVirtualMachine($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("recoverVirtualMachine", array(
            'id' => $id,
        ));
    }
    
    /**
    * List the virtual machines owned by the account.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $details comma separated list of host details requested, value can
    *         be a list of [all, group, nics, stats, secgrp, tmpl, servoff, iso, volume, min]
    *        . If no parameter is passed in, the details will be defaulted to all
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $forVirtualNetwork list by network type; true if need to list vms 
    *        using Virtual Network, false otherwise
    * @param string $groupId the group ID
    * @param string $hostId the host ID
    * @param string $hypervisor the target hypervisor for the template
    * @param string $id the ID of the virtual machine
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name name of the virtual machine
    * @param string $networkId list by network id
    * @param string $page 
    * @param string $pageSize 
    * @param string $podId the pod ID
    * @param string $projectId list firewall rules by project
    * @param string $state state of the virtual machine
    * @param string $storageId the storage ID where vm&#039;s volumes belong to
    * @param string $zoneId the availability zone ID
    * @param string $page Pagination
    */
    
    public function listVirtualMachines($account = "", $details = "", $domainId = "", $forVirtualNetwork = "", $groupId = "", $hostId = "", $hypervisor = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $networkId = "", $page = "", $pageSize = "", $podId = "", $projectId = "", $state = "", $storageId = "", $zoneId = "", $page = "") {

        return $this->request("listVirtualMachines", array(
            'account' => $account,
            'details' => $details,
            'domainid' => $domainId,
            'forvirtualnetwork' => $forVirtualNetwork,
            'groupid' => $groupId,
            'hostid' => $hostId,
            'hypervisor' => $hypervisor,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'networkid' => $networkId,
            'page' => $page,
            'pagesize' => $pageSize,
            'podid' => $podId,
            'projectid' => $projectId,
            'state' => $state,
            'storageid' => $storageId,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Returns an encrypted password for the VM
    *
    * @param string $id The ID of the virtual machine
    */
    
    public function getVMPassword($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("getVMPassword", array(
            'id' => $id,
        ));
    }
    
    /**
    * Attempts Migration of a VM to a different host or Root volume of the vm to a different storage pool
    *
    * @param string $virtualMachineId the ID of the virtual machine
    * @param string $hostId Destination Host ID to migrate VM to. Required for live mi
    *        grating a VM from host to host
    * @param string $storageId Destination storage pool ID to migrate VM volumes to. R
    *        equired for migrating the root disk volume
    */
    
    public function migrateVirtualMachine($virtualMachineId, $hostId = "", $storageId = "") {

        if (empty($virtualMachineId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineId"), MISSING_ARGUMENT);
        }

        return $this->request("migrateVirtualMachine", array(
            'virtualmachineid' => $virtualMachineId,
            'hostid' => $hostId,
            'storageid' => $storageId,
        ));
    }
    
    /**
    * Move a user VM to another user under same domain.
    *
    * @param string $account account name of the new VM owner.
    * @param string $domainId domain id of the new VM owner.
    * @param string $virtualMachineId the vm ID of the user VM to be moved
    * @param string $networkIds list of network ids that will be part of VM network af
    *        ter move in advanced network setting.
    * @param string $securityGroupIds comma separated list of security groups id that 
    *        going to be applied to the virtual machine. Should be passed only when vm is mov
    *        ed in a zone with Basic Network support.
    */
    
    public function assignVirtualMachine($account, $domainId, $virtualMachineId, $networkIds = "", $securityGroupIds = "") {

        if (empty($account)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "account"), MISSING_ARGUMENT);
        }

        if (empty($domainId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "domainId"), MISSING_ARGUMENT);
        }

        if (empty($virtualMachineId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineId"), MISSING_ARGUMENT);
        }

        return $this->request("assignVirtualMachine", array(
            'account' => $account,
            'domainid' => $domainId,
            'virtualmachineid' => $virtualMachineId,
            'networkids' => $networkIds,
            'securitygroupids' => $securityGroupIds,
        ));
    }
    
    /**
    * Restore a VM to original template or specific snapshot
    *
    * @param string $virtualMachineId Virtual Machine ID
    */
    
    public function restoreVirtualMachine($virtualMachineId) {

        if (empty($virtualMachineId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineId"), MISSING_ARGUMENT);
        }

        return $this->request("restoreVirtualMachine", array(
            'virtualmachineid' => $virtualMachineId,
        ));
    }
    
    /**
    * Adds traffic type to a physical network
    *
    * @param string $physicalNetworkId the Physical Network ID
    * @param string $trafficType the trafficType to be added to the physical network
    * @param string $kvmNetworkLabel The network name label of the physical device ded
    *        icated to this traffic on a KVM host
    * @param string $vlan The VLAN id to be used for Management traffic by VMware host
    *        
    * @param string $vmwareNetworkLabel The network name label of the physical device 
    *        dedicated to this traffic on a VMware host
    * @param string $xenNetworkLabel The network name label of the physical device ded
    *        icated to this traffic on a XenServer host
    */
    
    public function addTrafficType($physicalNetworkId, $trafficType, $kvmNetworkLabel = "", $vlan = "", $vmwareNetworkLabel = "", $xenNetworkLabel = "") {

        if (empty($physicalNetworkId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "physicalNetworkId"), MISSING_ARGUMENT);
        }

        if (empty($trafficType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "trafficType"), MISSING_ARGUMENT);
        }

        return $this->request("addTrafficType", array(
            'physicalnetworkid' => $physicalNetworkId,
            'traffictype' => $trafficType,
            'kvmnetworklabel' => $kvmNetworkLabel,
            'vlan' => $vlan,
            'vmwarenetworklabel' => $vmwareNetworkLabel,
            'xennetworklabel' => $xenNetworkLabel,
        ));
    }
    
    /**
    * Deletes traffic type of a physical network
    *
    * @param string $id traffic type id
    */
    
    public function deleteTrafficType($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteTrafficType", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists traffic types of a given physical network.
    *
    * @param string $physicalNetworkId the Physical Network ID
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listTrafficTypes($physicalNetworkId, $keyword = "", $page = "", $pageSize = "", $page = "") {

        if (empty($physicalNetworkId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "physicalNetworkId"), MISSING_ARGUMENT);
        }

        return $this->request("listTrafficTypes", array(
            'physicalnetworkid' => $physicalNetworkId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Updates traffic type of a physical network
    *
    * @param string $id traffic type id
    * @param string $kvmNetworkLabel The network name label of the physical device ded
    *        icated to this traffic on a KVM host
    * @param string $vmwareNetworkLabel The network name label of the physical device 
    *        dedicated to this traffic on a VMware host
    * @param string $xenNetworkLabel The network name label of the physical device ded
    *        icated to this traffic on a XenServer host
    */
    
    public function updateTrafficType($id, $kvmNetworkLabel = "", $vmwareNetworkLabel = "", $xenNetworkLabel = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateTrafficType", array(
            'id' => $id,
            'kvmnetworklabel' => $kvmNetworkLabel,
            'vmwarenetworklabel' => $vmwareNetworkLabel,
            'xennetworklabel' => $xenNetworkLabel,
        ));
    }
    
    /**
    * Lists implementors of implementor of a network traffic type or implementors of all network traffic types
    *
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $trafficType Optional. The network traffic type, if specified, ret
    *        urn its implementor. Otherwise, return all traffic types with their implementor
    * @param string $page Pagination
    */
    
    public function listTrafficTypeImplementors($keyword = "", $page = "", $pageSize = "", $trafficType = "", $page = "") {

        return $this->request("listTrafficTypeImplementors", array(
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'traffictype' => $trafficType,
            'page' => $page,
        ));
    }
    
    /**
    * Generates usage records. This will generate records only if there any records to be generated, i.e if the scheduled usage job was not run or failed
    *
    * @param string $endDate End date range for usage record query. Use yyyy-MM-dd as 
    *        the date format, e.g. startDate=2009-06-03.
    * @param string $startDate Start date range for usage record query. Use yyyy-MM-dd
    *         as the date format, e.g. startDate=2009-06-01.
    * @param string $domainId List events for the specified domain.
    */
    
    public function generateUsageRecords($endDate, $startDate, $domainId = "") {

        if (empty($endDate)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "endDate"), MISSING_ARGUMENT);
        }

        if (empty($startDate)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "startDate"), MISSING_ARGUMENT);
        }

        return $this->request("generateUsageRecords", array(
            'enddate' => $endDate,
            'startdate' => $startDate,
            'domainid' => $domainId,
        ));
    }
    
    /**
    * Lists usage records for accounts
    *
    * @param string $endDate End date range for usage record query. Use yyyy-MM-dd as 
    *        the date format, e.g. startDate=2009-06-03.
    * @param string $startDate Start date range for usage record query. Use yyyy-MM-dd
    *         as the date format, e.g. startDate=2009-06-01.
    * @param string $account List usage records for the specified user.
    * @param string $accountId List usage records for the specified account
    * @param string $domainId List usage records for the specified domain.
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId List usage records for specified project
    * @param string $type List usage records for the specified usage type
    * @param string $page Pagination
    */
    
    public function listUsageRecords($endDate, $startDate, $account = "", $accountId = "", $domainId = "", $keyword = "", $page = "", $pageSize = "", $projectId = "", $type = "", $page = "") {

        if (empty($endDate)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "endDate"), MISSING_ARGUMENT);
        }

        if (empty($startDate)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "startDate"), MISSING_ARGUMENT);
        }

        return $this->request("listUsageRecords", array(
            'enddate' => $endDate,
            'startdate' => $startDate,
            'account' => $account,
            'accountid' => $accountId,
            'domainid' => $domainId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'type' => $type,
            'page' => $page,
        ));
    }
    
    /**
    * List Usage Types
    *
    * @param string $page Pagination
    */
    
    public function listUsageTypes($page = "") {

        return $this->request("listUsageTypes", array(
            'page' => $page,
        ));
    }
    
    /**
    * Adds Traffic Monitor Host for Direct Network Usage
    *
    * @param string $url URL of the traffic monitor Host
    * @param string $zoneId Zone in which to add the external firewall appliance.
    */
    
    public function addTrafficMonitor($url, $zoneId) {

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("addTrafficMonitor", array(
            'url' => $url,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Deletes an traffic monitor host.
    *
    * @param string $id Id of the Traffic Monitor Host.
    */
    
    public function deleteTrafficMonitor($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteTrafficMonitor", array(
            'id' => $id,
        ));
    }
    
    /**
    * List traffic monitor Hosts.
    *
    * @param string $zoneId zone Id
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listTrafficMonitors($zoneId, $keyword = "", $page = "", $pageSize = "", $page = "") {

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("listTrafficMonitors", array(
            'zoneid' => $zoneId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Attaches a disk volume to a virtual machine.
    *
    * @param string $id the ID of the disk volume
    * @param string $virtualMachineId the ID of the virtual machine
    * @param string $deviceId the ID of the device to map the volume to within the gue
    *        st OS. If no deviceId is passed in, the next available deviceId will be chosen. 
    *        Possible values for a Linux OS are:* 1 - /dev/xvdb* 2 - /dev/xvdc* 4 - /dev/xvde
    *        * 5 - /dev/xvdf* 6 - /dev/xvdg* 7 - /dev/xvdh* 8 - /dev/xvdi* 9 - /dev/xvdj
    */
    
    public function attachVolume($id, $virtualMachineId, $deviceId = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($virtualMachineId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineId"), MISSING_ARGUMENT);
        }

        return $this->request("attachVolume", array(
            'id' => $id,
            'virtualmachineid' => $virtualMachineId,
            'deviceid' => $deviceId,
        ));
    }
    
    /**
    * Detaches a disk volume from a virtual machine.
    *
    * @param string $deviceId the device ID on the virtual machine where volume is det
    *        ached from
    * @param string $id the ID of the disk volume
    * @param string $virtualMachineId the ID of the virtual machine where the volume i
    *        s detached from
    */
    
    public function detachVolume($deviceId = "", $id = "", $virtualMachineId = "") {

        return $this->request("detachVolume", array(
            'deviceid' => $deviceId,
            'id' => $id,
            'virtualmachineid' => $virtualMachineId,
        ));
    }
    
    /**
    * Creates a disk volume from a disk offering. This disk volume must still be attached to a virtual machine to make use of it.
    *
    * @param string $name the name of the disk volume
    * @param string $account the account associated with the disk volume. Must be used
    *         with the domainId parameter.
    * @param string $diskOfferingId the ID of the disk offering. Either diskOfferingId
    *         or snapshotId must be passed in.
    * @param string $domainId the domain ID associated with the disk offering. If used
    *         with the account parameter returns the disk volume associated with the account 
    *        for the specified domain.
    * @param string $projectId the project associated with the volume. Mutually exclus
    *        ive with account parameter
    * @param string $size Arbitrary volume size
    * @param string $snapshotId the snapshot ID for the disk volume. Either diskOfferi
    *        ngId or snapshotId must be passed in.
    * @param string $zoneId the ID of the availability zone
    */
    
    public function createVolume($name, $account = "", $diskOfferingId = "", $domainId = "", $projectId = "", $size = "", $snapshotId = "", $zoneId = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createVolume", array(
            'name' => $name,
            'account' => $account,
            'diskofferingid' => $diskOfferingId,
            'domainid' => $domainId,
            'projectid' => $projectId,
            'size' => $size,
            'snapshotid' => $snapshotId,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Deletes a detached disk volume.
    *
    * @param string $id The ID of the disk volume
    */
    
    public function deleteVolume($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteVolume", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists all volumes.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $hostId list volumes on specified host
    * @param string $id the ID of the disk volume
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name the name of the disk volume
    * @param string $page 
    * @param string $pageSize 
    * @param string $podId the pod id the disk volume belongs to
    * @param string $projectId list firewall rules by project
    * @param string $type the type of disk volume
    * @param string $virtualMachineId the ID of the virtual machine
    * @param string $zoneId the ID of the availability zone
    * @param string $page Pagination
    */
    
    public function listVolumes($account = "", $domainId = "", $hostId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $podId = "", $projectId = "", $type = "", $virtualMachineId = "", $zoneId = "", $page = "") {

        return $this->request("listVolumes", array(
            'account' => $account,
            'domainid' => $domainId,
            'hostid' => $hostId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'podid' => $podId,
            'projectid' => $projectId,
            'type' => $type,
            'virtualmachineid' => $virtualMachineId,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Extracts volume
    *
    * @param string $id the ID of the volume
    * @param string $mode the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
    * @param string $zoneId the ID of the zone where the volume is located
    * @param string $url the url to which the volume would be extracted
    */
    
    public function extractVolume($id, $mode, $zoneId, $url = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($mode)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "mode"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("extractVolume", array(
            'id' => $id,
            'mode' => $mode,
            'zoneid' => $zoneId,
            'url' => $url,
        ));
    }
    
    /**
    * Migrate volume
    *
    * @param string $storageId destination storage pool ID to migrate the volume to
    * @param string $volumeId the ID of the volume
    */
    
    public function migrateVolume($storageId, $volumeId) {

        if (empty($storageId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "storageId"), MISSING_ARGUMENT);
        }

        if (empty($volumeId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "volumeId"), MISSING_ARGUMENT);
        }

        return $this->request("migrateVolume", array(
            'storageid' => $storageId,
            'volumeid' => $volumeId,
        ));
    }
    
    /**
    * Create a volume
    *
    * @param string $aggregateName aggregate name.
    * @param string $ipAddress ip address.
    * @param string $password password.
    * @param string $poolName pool name.
    * @param string $size volume size.
    * @param string $userName user name.
    * @param string $volumeName volume name.
    * @param string $snapshotPolicy snapshot policy.
    * @param string $snapshotReservation snapshot reservation.
    */
    
    public function createVolumeOnFiler($aggregateName, $ipAddress, $password, $poolName, $size, $userName, $volumeName, $snapshotPolicy = "", $snapshotReservation = "") {

        if (empty($aggregateName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "aggregateName"), MISSING_ARGUMENT);
        }

        if (empty($ipAddress)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "ipAddress"), MISSING_ARGUMENT);
        }

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($poolName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "poolName"), MISSING_ARGUMENT);
        }

        if (empty($size)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "size"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        if (empty($volumeName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "volumeName"), MISSING_ARGUMENT);
        }

        return $this->request("createVolumeOnFiler", array(
            'aggregatename' => $aggregateName,
            'ipaddress' => $ipAddress,
            'password' => $password,
            'poolname' => $poolName,
            'size' => $size,
            'username' => $userName,
            'volumename' => $volumeName,
            'snapshotpolicy' => $snapshotPolicy,
            'snapshotreservation' => $snapshotReservation,
        ));
    }
    
    /**
    * Destroy a Volume
    *
    * @param string $aggregateName aggregate name.
    * @param string $ipAddress ip address.
    * @param string $volumeName volume name.
    */
    
    public function destroyVolumeOnFiler($aggregateName, $ipAddress, $volumeName) {

        if (empty($aggregateName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "aggregateName"), MISSING_ARGUMENT);
        }

        if (empty($ipAddress)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "ipAddress"), MISSING_ARGUMENT);
        }

        if (empty($volumeName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "volumeName"), MISSING_ARGUMENT);
        }

        return $this->request("destroyVolumeOnFiler", array(
            'aggregatename' => $aggregateName,
            'ipaddress' => $ipAddress,
            'volumename' => $volumeName,
        ));
    }
    
    /**
    * List Volumes
    *
    * @param string $poolName pool name.
    * @param string $page Pagination
    */
    
    public function listVolumesOnFiler($poolName, $page = "") {

        if (empty($poolName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "poolName"), MISSING_ARGUMENT);
        }

        return $this->request("listVolumesOnFiler", array(
            'poolname' => $poolName,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a user for an account that already exists
    *
    * @param string $account Creates the user under the specified account. If no accou
    *        nt is specified, the username will be used as the account name.
    * @param string $email email
    * @param string $firstName firstname
    * @param string $lastName lastname
    * @param string $password Hashed password (Default is MD5). If you wish to use any
    *         other hashing algorithm, you would need to write a custom authentication adapte
    *        r See Docs section.
    * @param string $userName Unique username.
    * @param string $domainId Creates the user under the specified domain. Has to be a
    *        ccompanied with the account parameter
    * @param string $timezone Specifies a timezone for this command. For more informat
    *        ion on the timezone parameter, see Time Zone Format.
    */
    
    public function createUser($account, $email, $firstName, $lastName, $password, $userName, $domainId = "", $timezone = "") {

        if (empty($account)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "account"), MISSING_ARGUMENT);
        }

        if (empty($email)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "email"), MISSING_ARGUMENT);
        }

        if (empty($firstName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "firstName"), MISSING_ARGUMENT);
        }

        if (empty($lastName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lastName"), MISSING_ARGUMENT);
        }

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        return $this->request("createUser", array(
            'account' => $account,
            'email' => $email,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'password' => $password,
            'username' => $userName,
            'domainid' => $domainId,
            'timezone' => $timezone,
        ));
    }
    
    /**
    * Creates a user for an account
    *
    * @param string $id Deletes a user
    */
    
    public function deleteUser($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteUser", array(
            'id' => $id,
        ));
    }
    
    /**
    * Updates a user account
    *
    * @param string $id User id
    * @param string $email email
    * @param string $firstName first name
    * @param string $lastName last name
    * @param string $password Hashed password (default is MD5). If you wish to use any
    *         other hasing algorithm, you would need to write a custom authentication adapter
    *        
    * @param string $timezone Specifies a timezone for this command. For more informat
    *        ion on the timezone parameter, see Time Zone Format.
    * @param string $userApiKey The API key for the user. Must be specified with userS
    *        ecretKey
    * @param string $userName Unique username
    * @param string $userSecretKey The secret key for the user. Must be specified with
    *         userApiKey
    */
    
    public function updateUser($id, $email = "", $firstName = "", $lastName = "", $password = "", $timezone = "", $userApiKey = "", $userName = "", $userSecretKey = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateUser", array(
            'id' => $id,
            'email' => $email,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'password' => $password,
            'timezone' => $timezone,
            'userapikey' => $userApiKey,
            'username' => $userName,
            'usersecretkey' => $userSecretKey,
        ));
    }
    
    /**
    * Lists user accounts
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $accountType List users by account type. Valid types include admin
    *        , domain-admin, read-only-admin, or user.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id List user by ID.
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $state List users by state of the user account.
    * @param string $userName List user by the username
    * @param string $page Pagination
    */
    
    public function listUsers($account = "", $accountType = "", $domainId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $state = "", $userName = "", $page = "") {

        return $this->request("listUsers", array(
            'account' => $account,
            'accounttype' => $accountType,
            'domainid' => $domainId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'state' => $state,
            'username' => $userName,
            'page' => $page,
        ));
    }
    
    /**
    * Disables a user account
    *
    * @param string $id Disables user by user ID.
    */
    
    public function disableUser($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("disableUser", array(
            'id' => $id,
        ));
    }
    
    /**
    * Enables a user account
    *
    * @param string $id Enables user by user ID.
    */
    
    public function enableUser($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("enableUser", array(
            'id' => $id,
        ));
    }
    
    /**
    * This command allows a user to register for the developer API, returning a secret key and an API key. This request is made through the integration API port, so it is a privileged command and must be made on behalf of a user. It is up to the implementer just how the username and password are entered, and then how that translates to an integration API request. Both secret key and API key should be returned to the user
    *
    * @param string $id User id
    */
    
    public function registerUserKeys($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("registerUserKeys", array(
            'id' => $id,
        ));
    }
    
    /**
    * Adds vpn users
    *
    * @param string $password password for the username
    * @param string $userName username for the vpn user
    * @param string $account an optional account for the vpn user. Must be used with d
    *        omainId.
    * @param string $domainId an optional domainId for the vpn user. If the account pa
    *        rameter is used, domainId must also be used.
    * @param string $projectId add vpn user to the specific project
    */
    
    public function addVpnUser($password, $userName, $account = "", $domainId = "", $projectId = "") {

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        return $this->request("addVpnUser", array(
            'password' => $password,
            'username' => $userName,
            'account' => $account,
            'domainid' => $domainId,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Removes vpn user
    *
    * @param string $userName username for the vpn user
    * @param string $account an optional account for the vpn user. Must be used with d
    *        omainId.
    * @param string $domainId an optional domainId for the vpn user. If the account pa
    *        rameter is used, domainId must also be used.
    * @param string $projectId remove vpn user from the project
    */
    
    public function removeVpnUser($userName, $account = "", $domainId = "", $projectId = "") {

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        return $this->request("removeVpnUser", array(
            'username' => $userName,
            'account' => $account,
            'domainid' => $domainId,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Lists vpn users
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id the ID of the vpn user
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $userName the username of the vpn user.
    * @param string $page Pagination
    */
    
    public function listVpnUsers($account = "", $domainId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $projectId = "", $userName = "", $page = "") {

        return $this->request("listVpnUsers", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'username' => $userName,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a template of a virtual machine. The virtual machine must be in a STOPPED state. A template created from this command is automatically designated as a private template visible to the account that created it.
    *
    * @param string $displayText the display text of the template. This is usually use
    *        d for display purposes.
    * @param string $name the name of the template
    * @param string $osTypeId the ID of the OS Type that best represents the OS of thi
    *        s template.
    * @param string $bits 32 or 64 bit
    * @param string $details Template details in key/value pairs.
    * @param string $isFeatured true if this template is a featured template, false ot
    *        herwise
    * @param string $isPublic true if this template is a public template, false otherw
    *        ise
    * @param string $passwordEnabled true if the template supports the password reset 
    *        feature; default is false
    * @param string $requireShvm true if the template requres HVM, false otherwise
    * @param string $snapshotId the ID of the snapshot the template is being created f
    *        rom. Either this parameter, or volumeId has to be passed in
    * @param string $templateTag the tag for this template.
    * @param string $url Optional, only for baremetal hypervisor. The directory name w
    *        here template stored on CIFS server
    * @param string $virtualMachineId Optional, VM ID. If this presents, it is going t
    *        o create a baremetal template for VM this ID refers to. This is only for VM whos
    *        e hypervisor type is BareMetal
    * @param string $volumeId the ID of the disk volume the template is being created 
    *        from. Either this parameter, or snapshotId has to be passed in
    */
    
    public function createTemplate($displayText, $name, $osTypeId, $bits = "", $details = "", $isFeatured = "", $isPublic = "", $passwordEnabled = "", $requireShvm = "", $snapshotId = "", $templateTag = "", $url = "", $virtualMachineId = "", $volumeId = "") {

        if (empty($displayText)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "displayText"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($osTypeId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "osTypeId"), MISSING_ARGUMENT);
        }

        return $this->request("createTemplate", array(
            'displaytext' => $displayText,
            'name' => $name,
            'ostypeid' => $osTypeId,
            'bits' => $bits,
            'details' => $details,
            'isfeatured' => $isFeatured,
            'ispublic' => $isPublic,
            'passwordenabled' => $passwordEnabled,
            'requireshvm' => $requireShvm,
            'snapshotid' => $snapshotId,
            'templatetag' => $templateTag,
            'url' => $url,
            'virtualmachineid' => $virtualMachineId,
            'volumeid' => $volumeId,
        ));
    }
    
    /**
    * Registers an existing template into the Cloud.com cloud.
    *
    * @param string $displayText the display text of the template. This is usually use
    *        d for display purposes.
    * @param string $format the format for the template. Possible values include QCOW2
    *        , RAW, and VHD.
    * @param string $hypervisor the target hypervisor for the template
    * @param string $name the name of the template
    * @param string $osTypeId the ID of the OS Type that best represents the OS of thi
    *        s template.
    * @param string $url the URL of where the template is hosted. Possible URL include
    *         http:// and https://
    * @param string $zoneId the ID of the zone the template is to be hosted on
    * @param string $account an optional accountName. Must be used with domainId.
    * @param string $bits 32 or 64 bits support. 64 by default
    * @param string $checksum the MD5 checksum value of this template
    * @param string $details Template details in key/value pairs.
    * @param string $domainId an optional domainId. If the account parameter is used, 
    *        domainId must also be used.
    * @param string $isExtractable true if the template or its derivatives are extract
    *        able; default is false
    * @param string $isFeatured true if this template is a featured template, false ot
    *        herwise
    * @param string $isPublic true if the template is available to all accounts; defau
    *        lt is true
    * @param string $passwordEnabled true if the template supports the password reset 
    *        feature; default is false
    * @param string $projectId Register template for the project
    * @param string $requireShvm true if this template requires HVM
    * @param string $sshKeyEnabled true if the template supports the sshkey upload fea
    *        ture; default is false
    * @param string $templateTag the tag for this template.
    */
    
    public function registerTemplate($displayText, $format, $hypervisor, $name, $osTypeId, $url, $zoneId, $account = "", $bits = "", $checksum = "", $details = "", $domainId = "", $isExtractable = "", $isFeatured = "", $isPublic = "", $passwordEnabled = "", $projectId = "", $requireShvm = "", $sshKeyEnabled = "", $templateTag = "") {

        if (empty($displayText)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "displayText"), MISSING_ARGUMENT);
        }

        if (empty($format)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "format"), MISSING_ARGUMENT);
        }

        if (empty($hypervisor)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "hypervisor"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($osTypeId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "osTypeId"), MISSING_ARGUMENT);
        }

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("registerTemplate", array(
            'displaytext' => $displayText,
            'format' => $format,
            'hypervisor' => $hypervisor,
            'name' => $name,
            'ostypeid' => $osTypeId,
            'url' => $url,
            'zoneid' => $zoneId,
            'account' => $account,
            'bits' => $bits,
            'checksum' => $checksum,
            'details' => $details,
            'domainid' => $domainId,
            'isextractable' => $isExtractable,
            'isfeatured' => $isFeatured,
            'ispublic' => $isPublic,
            'passwordenabled' => $passwordEnabled,
            'projectid' => $projectId,
            'requireshvm' => $requireShvm,
            'sshkeyenabled' => $sshKeyEnabled,
            'templatetag' => $templateTag,
        ));
    }
    
    /**
    * Updates attributes of a template.
    *
    * @param string $id the ID of the image file
    * @param string $bootable true if image is bootable, false otherwise
    * @param string $displayText the display text of the image
    * @param string $format the format for the image
    * @param string $name the name of the image file
    * @param string $osTypeId the ID of the OS type that best represents the OS of thi
    *        s image.
    * @param string $passwordEnabled true if the image supports the password reset fea
    *        ture; default is false
    * @param string $sortKey sort key of the template, integer
    */
    
    public function updateTemplate($id, $bootable = "", $displayText = "", $format = "", $name = "", $osTypeId = "", $passwordEnabled = "", $sortKey = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateTemplate", array(
            'id' => $id,
            'bootable' => $bootable,
            'displaytext' => $displayText,
            'format' => $format,
            'name' => $name,
            'ostypeid' => $osTypeId,
            'passwordenabled' => $passwordEnabled,
            'sortkey' => $sortKey,
        ));
    }
    
    /**
    * Copies a template from one zone to another.
    *
    * @param string $id Template ID.
    * @param string $destzoneId ID of the zone the template is being copied to.
    * @param string $sourceZoneId ID of the zone the template is currently hosted on.
    */
    
    public function copyTemplate($id, $destzoneId, $sourceZoneId) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($destzoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "destzoneId"), MISSING_ARGUMENT);
        }

        if (empty($sourceZoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "sourceZoneId"), MISSING_ARGUMENT);
        }

        return $this->request("copyTemplate", array(
            'id' => $id,
            'destzoneid' => $destzoneId,
            'sourcezoneid' => $sourceZoneId,
        ));
    }
    
    /**
    * Deletes a template from the system. All virtual machines using the deleted template will not be affected.
    *
    * @param string $id the ID of the template
    * @param string $zoneId the ID of zone of the template
    */
    
    public function deleteTemplate($id, $zoneId = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteTemplate", array(
            'id' => $id,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * List all public, private, and privileged templates.
    *
    * @param string $templateFilter possible values are &quot;featured&quot;, &quot;se
    *        lf&quot;, &quot;self-executable&quot;, &quot;executable&quot;, and &quot;communi
    *        ty&quot;.* featured-templates that are featured and are public* self-templates t
    *        hat have been registered/created by the owner* selfexecutable-templates that hav
    *        e been registered/created by the owner that can be used to deploy a new VM* exec
    *        utable-all templates that can be used to deploy a new VM* community-templates th
    *        at are public.
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $hypervisor the hypervisor for which to restrict the search
    * @param string $id the template ID
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name the template name
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $zoneId list templates by zoneId
    * @param string $page Pagination
    */
    
    public function listTemplates($templateFilter, $account = "", $domainId = "", $hypervisor = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $projectId = "", $zoneId = "", $page = "") {

        if (empty($templateFilter)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "templateFilter"), MISSING_ARGUMENT);
        }

        return $this->request("listTemplates", array(
            'templatefilter' => $templateFilter,
            'account' => $account,
            'domainid' => $domainId,
            'hypervisor' => $hypervisor,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Updates a template visibility permissions. A public template is visible to all accounts within the same domain. A private template is visible only to the owner of the template. A priviledged template is a private template with account permissions added. Only accounts specified under the template permissions are visible to them.
    *
    * @param string $id the template ID
    * @param string $accounts a comma delimited list of accounts. If specified, &quot;
    *        op&quot; parameter has to be passed in.
    * @param string $isExtractable true if the template/iso is extractable, false othe
    *        r wise. Can be set only by root admin
    * @param string $isFeatured true for featured template/iso, false otherwise
    * @param string $isPublic true for public template/iso, false for private template
    *        s/isos
    * @param string $op permission operator (add, remove, reset)
    * @param string $projectIds a comma delimited list of projects. If specified, &quo
    *        t;op&quot; parameter has to be passed in.
    */
    
    public function updateTemplatePermissions($id, $accounts = "", $isExtractable = "", $isFeatured = "", $isPublic = "", $op = "", $projectIds = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateTemplatePermissions", array(
            'id' => $id,
            'accounts' => $accounts,
            'isextractable' => $isExtractable,
            'isfeatured' => $isFeatured,
            'ispublic' => $isPublic,
            'op' => $op,
            'projectids' => $projectIds,
        ));
    }
    
    /**
    * List template visibility and all accounts that have permissions to view this template.
    *
    * @param string $id the template ID
    * @param string $page Pagination
    */
    
    public function listTemplatePermissions($id, $page = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("listTemplatePermissions", array(
            'id' => $id,
            'page' => $page,
        ));
    }
    
    /**
    * Extracts a template
    *
    * @param string $id the ID of the template
    * @param string $mode the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
    * @param string $url the url to which the ISO would be extracted
    * @param string $zoneId the ID of the zone where the ISO is originally located
    */
    
    public function extractTemplate($id, $mode, $url = "", $zoneId = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($mode)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "mode"), MISSING_ARGUMENT);
        }

        return $this->request("extractTemplate", array(
            'id' => $id,
            'mode' => $mode,
            'url' => $url,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * load template into primary storage
    *
    * @param string $templateId template ID of the template to be prepared in primary 
    *        storage(s).
    * @param string $zoneId zone ID of the template to be prepared in primary storage(
    *        s).
    */
    
    public function prepareTemplate($templateId, $zoneId) {

        if (empty($templateId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "templateId"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("prepareTemplate", array(
            'templateid' => $templateId,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Attaches an ISO to a virtual machine.
    *
    * @param string $id the ID of the ISO file
    * @param string $virtualMachineId the ID of the virtual machine
    */
    
    public function attachIso($id, $virtualMachineId) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($virtualMachineId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineId"), MISSING_ARGUMENT);
        }

        return $this->request("attachIso", array(
            'id' => $id,
            'virtualmachineid' => $virtualMachineId,
        ));
    }
    
    /**
    * Detaches any ISO file (if any) currently attached to a virtual machine.
    *
    * @param string $virtualMachineId The ID of the virtual machine
    */
    
    public function detachIso($virtualMachineId) {

        if (empty($virtualMachineId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineId"), MISSING_ARGUMENT);
        }

        return $this->request("detachIso", array(
            'virtualmachineid' => $virtualMachineId,
        ));
    }
    
    /**
    * Lists all available ISO files.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $bootable true if the ISO is bootable, false otherwise
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $hypervisor the hypervisor for which to restrict the search
    * @param string $id list all isos by id
    * @param string $isoFilter possible values are &quot;featured&quot;, &quot;self&qu
    *        ot;, &quot;self-executable&quot;,&quot;executable&quot;, and &quot;community&quo
    *        t;. * featured-ISOs that are featured and are publicself-ISOs that have been reg
    *        istered/created by the owner. * selfexecutable-ISOs that have been registered/cr
    *        eated by the owner that can be used to deploy a new VM. * executable-all ISOs th
    *        at can be used to deploy a new VM * community-ISOs that are public.
    * @param string $isPublic true if the ISO is publicly available to all users, fals
    *        e otherwise.
    * @param string $isReady true if this ISO is ready to be deployed
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name list all isos by name
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $zoneId the ID of the zone
    * @param string $page Pagination
    */
    
    public function listIsos($account = "", $bootable = "", $domainId = "", $hypervisor = "", $id = "", $isoFilter = "", $isPublic = "", $isReady = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $projectId = "", $zoneId = "", $page = "") {

        return $this->request("listIsos", array(
            'account' => $account,
            'bootable' => $bootable,
            'domainid' => $domainId,
            'hypervisor' => $hypervisor,
            'id' => $id,
            'isofilter' => $isoFilter,
            'ispublic' => $isPublic,
            'isready' => $isReady,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Registers an existing ISO into the Cloud.com Cloud.
    *
    * @param string $displayText the display text of the ISO. This is usually used for
    *         display purposes.
    * @param string $name the name of the ISO
    * @param string $url the URL to where the ISO is currently being hosted
    * @param string $zoneId the ID of the zone you wish to register the ISO to.
    * @param string $account an optional account name. Must be used with domainId.
    * @param string $bootable true if this ISO is bootable. If not passed explicitly i
    *        ts assumed to be true
    * @param string $checksum the MD5 checksum value of this ISO
    * @param string $domainId an optional domainId. If the account parameter is used, 
    *        domainId must also be used.
    * @param string $isExtractable true if the iso or its derivatives are extractable;
    *         default is false
    * @param string $isFeatured true if you want this ISO to be featured
    * @param string $isPublic true if you want to register the ISO to be publicly avai
    *        lable to all users, false otherwise.
    * @param string $osTypeId the ID of the OS Type that best represents the OS of thi
    *        s ISO. If the iso is bootable this parameter needs to be passed
    * @param string $projectId Register iso for the project
    */
    
    public function registerIso($displayText, $name, $url, $zoneId, $account = "", $bootable = "", $checksum = "", $domainId = "", $isExtractable = "", $isFeatured = "", $isPublic = "", $osTypeId = "", $projectId = "") {

        if (empty($displayText)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "displayText"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("registerIso", array(
            'displaytext' => $displayText,
            'name' => $name,
            'url' => $url,
            'zoneid' => $zoneId,
            'account' => $account,
            'bootable' => $bootable,
            'checksum' => $checksum,
            'domainid' => $domainId,
            'isextractable' => $isExtractable,
            'isfeatured' => $isFeatured,
            'ispublic' => $isPublic,
            'ostypeid' => $osTypeId,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Updates an ISO file.
    *
    * @param string $id the ID of the image file
    * @param string $bootable true if image is bootable, false otherwise
    * @param string $displayText the display text of the image
    * @param string $format the format for the image
    * @param string $name the name of the image file
    * @param string $osTypeId the ID of the OS type that best represents the OS of thi
    *        s image.
    * @param string $passwordEnabled true if the image supports the password reset fea
    *        ture; default is false
    * @param string $sortKey sort key of the template, integer
    */
    
    public function updateIso($id, $bootable = "", $displayText = "", $format = "", $name = "", $osTypeId = "", $passwordEnabled = "", $sortKey = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateIso", array(
            'id' => $id,
            'bootable' => $bootable,
            'displaytext' => $displayText,
            'format' => $format,
            'name' => $name,
            'ostypeid' => $osTypeId,
            'passwordenabled' => $passwordEnabled,
            'sortkey' => $sortKey,
        ));
    }
    
    /**
    * Deletes an ISO file.
    *
    * @param string $id the ID of the ISO file
    * @param string $zoneId the ID of the zone of the ISO file. If not specified, the 
    *        ISO will be deleted from all the zones
    */
    
    public function deleteIso($id, $zoneId = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteIso", array(
            'id' => $id,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Copies a template from one zone to another.
    *
    * @param string $id Template ID.
    * @param string $destzoneId ID of the zone the template is being copied to.
    * @param string $sourceZoneId ID of the zone the template is currently hosted on.
    */
    
    public function copyIso($id, $destzoneId, $sourceZoneId) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($destzoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "destzoneId"), MISSING_ARGUMENT);
        }

        if (empty($sourceZoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "sourceZoneId"), MISSING_ARGUMENT);
        }

        return $this->request("copyIso", array(
            'id' => $id,
            'destzoneid' => $destzoneId,
            'sourcezoneid' => $sourceZoneId,
        ));
    }
    
    /**
    * Updates iso permissions
    *
    * @param string $id the template ID
    * @param string $accounts a comma delimited list of accounts. If specified, &quot;
    *        op&quot; parameter has to be passed in.
    * @param string $isExtractable true if the template/iso is extractable, false othe
    *        r wise. Can be set only by root admin
    * @param string $isFeatured true for featured template/iso, false otherwise
    * @param string $isPublic true for public template/iso, false for private template
    *        s/isos
    * @param string $op permission operator (add, remove, reset)
    * @param string $projectIds a comma delimited list of projects. If specified, &quo
    *        t;op&quot; parameter has to be passed in.
    */
    
    public function updateIsoPermissions($id, $accounts = "", $isExtractable = "", $isFeatured = "", $isPublic = "", $op = "", $projectIds = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateIsoPermissions", array(
            'id' => $id,
            'accounts' => $accounts,
            'isextractable' => $isExtractable,
            'isfeatured' => $isFeatured,
            'ispublic' => $isPublic,
            'op' => $op,
            'projectids' => $projectIds,
        ));
    }
    
    /**
    * List template visibility and all accounts that have permissions to view this template.
    *
    * @param string $id the template ID
    * @param string $page Pagination
    */
    
    public function listIsoPermissions($id, $page = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("listIsoPermissions", array(
            'id' => $id,
            'page' => $page,
        ));
    }
    
    /**
    * Extracts an ISO
    *
    * @param string $id the ID of the ISO file
    * @param string $mode the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
    * @param string $url the url to which the ISO would be extracted
    * @param string $zoneId the ID of the zone where the ISO is originally located
    */
    
    public function extractIso($id, $mode, $url = "", $zoneId = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($mode)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "mode"), MISSING_ARGUMENT);
        }

        return $this->request("extractIso", array(
            'id' => $id,
            'mode' => $mode,
            'url' => $url,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Lists all port forwarding rules for an IP address.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id Lists rule with the specified ID.
    * @param string $ipAddressId the id of IP address of the port forwarding services
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $page Pagination
    */
    
    public function listPortForwardingRules($account = "", $domainId = "", $id = "", $ipAddressId = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $projectId = "", $page = "") {

        return $this->request("listPortForwardingRules", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'ipaddressid' => $ipAddressId,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a port forwarding rule
    *
    * @param string $ipAddressId the IP address id of the port forwarding rule
    * @param string $privatePort the starting port of port forwarding rule&#039;s priv
    *        ate port range
    * @param string $protocol the protocol for the port fowarding rule. Valid values a
    *        re TCP or UDP.
    * @param string $publicPort the starting port of port forwarding rule&#039;s publi
    *        c port range
    * @param string $virtualMachineId the ID of the virtual machine for the port forwa
    *        rding rule
    * @param string $cidrList the cidr list to forward traffic from
    * @param string $openFirewall if true, firewall rule for source/end pubic port is 
    *        automatically created; if false - firewall rule has to be created explicitely. H
    *        as value true by default
    */
    
    public function createPortForwardingRule($ipAddressId, $privatePort, $protocol, $publicPort, $virtualMachineId, $cidrList = "", $openFirewall = "") {

        if (empty($ipAddressId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "ipAddressId"), MISSING_ARGUMENT);
        }

        if (empty($privatePort)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "privatePort"), MISSING_ARGUMENT);
        }

        if (empty($protocol)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "protocol"), MISSING_ARGUMENT);
        }

        if (empty($publicPort)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "publicPort"), MISSING_ARGUMENT);
        }

        if (empty($virtualMachineId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineId"), MISSING_ARGUMENT);
        }

        return $this->request("createPortForwardingRule", array(
            'ipaddressid' => $ipAddressId,
            'privateport' => $privatePort,
            'protocol' => $protocol,
            'publicport' => $publicPort,
            'virtualmachineid' => $virtualMachineId,
            'cidrlist' => $cidrList,
            'openfirewall' => $openFirewall,
        ));
    }
    
    /**
    * Deletes a port forwarding rule
    *
    * @param string $id the ID of the port forwarding rule
    */
    
    public function deletePortForwardingRule($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deletePortForwardingRule", array(
            'id' => $id,
        ));
    }
    
    /**
    * Creates a firewall rule for a given ip address
    *
    * @param string $protocol the protocol for the firewall rule. Valid values are TCP
    *        /UDP/ICMP.
    * @param string $cidrList the cidr list to forward traffic from
    * @param string $endPort the ending port of firewall rule
    * @param string $icmpCode error code for this icmp message
    * @param string $icmpType type of the icmp message being sent
    * @param string $ipAddressId the IP address id of the port forwarding rule
    * @param string $startPort the starting port of firewall rule
    * @param string $type type of firewallrule: system/user
    */
    
    public function createFirewallRule($protocol, $cidrList = "", $endPort = "", $icmpCode = "", $icmpType = "", $ipAddressId = "", $startPort = "", $type = "") {

        if (empty($protocol)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "protocol"), MISSING_ARGUMENT);
        }

        return $this->request("createFirewallRule", array(
            'protocol' => $protocol,
            'cidrlist' => $cidrList,
            'endport' => $endPort,
            'icmpcode' => $icmpCode,
            'icmptype' => $icmpType,
            'ipaddressid' => $ipAddressId,
            'startport' => $startPort,
            'type' => $type,
        ));
    }
    
    /**
    * Deletes a firewall rule
    *
    * @param string $id the ID of the firewall rule
    */
    
    public function deleteFirewallRule($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteFirewallRule", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists all firewall rules for an IP address.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id Lists rule with the specified ID.
    * @param string $ipAddressId the id of IP address of the firwall services
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $page Pagination
    */
    
    public function listFirewallRules($account = "", $domainId = "", $id = "", $ipAddressId = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $projectId = "", $page = "") {

        return $this->request("listFirewallRules", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'ipaddressid' => $ipAddressId,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'page' => $page,
        ));
    }
    
    /**
    * Adds a SRX firewall device
    *
    * @param string $networkDeviceType supports only JuniperSRXFirewall
    * @param string $password Credentials to reach SRX firewall device
    * @param string $physicalNetworkId the Physical Network ID
    * @param string $url URL of the SRX appliance.
    * @param string $userName Credentials to reach SRX firewall device
    */
    
    public function addSrxFirewall($networkDeviceType, $password, $physicalNetworkId, $url, $userName) {

        if (empty($networkDeviceType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "networkDeviceType"), MISSING_ARGUMENT);
        }

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($physicalNetworkId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "physicalNetworkId"), MISSING_ARGUMENT);
        }

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        return $this->request("addSrxFirewall", array(
            'networkdevicetype' => $networkDeviceType,
            'password' => $password,
            'physicalnetworkid' => $physicalNetworkId,
            'url' => $url,
            'username' => $userName,
        ));
    }
    
    /**
    * delete a SRX firewall device
    *
    * @param string $fwDeviceId srx firewall device ID
    */
    
    public function deleteSrxFirewall($fwDeviceId) {

        if (empty($fwDeviceId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "fwDeviceId"), MISSING_ARGUMENT);
        }

        return $this->request("deleteSrxFirewall", array(
            'fwdeviceid' => $fwDeviceId,
        ));
    }
    
    /**
    * Configures a SRX firewall device
    *
    * @param string $fwDeviceId SRX firewall device ID
    * @param string $fwDeviceCapacity capacity of the firewall device, Capacity will b
    *        e interpreted as number of networks device can handle
    */
    
    public function configureSrxFirewall($fwDeviceId, $fwDeviceCapacity = "") {

        if (empty($fwDeviceId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "fwDeviceId"), MISSING_ARGUMENT);
        }

        return $this->request("configureSrxFirewall", array(
            'fwdeviceid' => $fwDeviceId,
            'fwdevicecapacity' => $fwDeviceCapacity,
        ));
    }
    
    /**
    * lists SRX firewall devices in a physical network
    *
    * @param string $fwDeviceId SRX firewall device ID
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $physicalNetworkId the Physical Network ID
    * @param string $page Pagination
    */
    
    public function listSrxFirewalls($fwDeviceId = "", $keyword = "", $page = "", $pageSize = "", $physicalNetworkId = "", $page = "") {

        return $this->request("listSrxFirewalls", array(
            'fwdeviceid' => $fwDeviceId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'physicalnetworkid' => $physicalNetworkId,
            'page' => $page,
        ));
    }
    
    /**
    * Starts a router.
    *
    * @param string $id the ID of the router
    */
    
    public function startRouter($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("startRouter", array(
            'id' => $id,
        ));
    }
    
    /**
    * Starts a router.
    *
    * @param string $id the ID of the router
    */
    
    public function rebootRouter($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("rebootRouter", array(
            'id' => $id,
        ));
    }
    
    /**
    * Stops a router.
    *
    * @param string $id the ID of the router
    * @param string $forced Force stop the VM. The caller knows the VM is stopped.
    */
    
    public function stopRouter($id, $forced = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("stopRouter", array(
            'id' => $id,
            'forced' => $forced,
        ));
    }
    
    /**
    * Destroys a router.
    *
    * @param string $id the ID of the router
    */
    
    public function destroyRouter($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("destroyRouter", array(
            'id' => $id,
        ));
    }
    
    /**
    * Upgrades domain router to a new service offering
    *
    * @param string $id The ID of the router
    * @param string $serviceOfferingId the service offering ID to apply to the domain 
    *        router
    */
    
    public function changeServiceForRouter($id, $serviceOfferingId) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($serviceOfferingId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "serviceOfferingId"), MISSING_ARGUMENT);
        }

        return $this->request("changeServiceForRouter", array(
            'id' => $id,
            'serviceofferingid' => $serviceOfferingId,
        ));
    }
    
    /**
    * List routers.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $hostId the host ID of the router
    * @param string $id the ID of the disk router
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name the name of the router
    * @param string $networkId list by network id
    * @param string $page 
    * @param string $pageSize 
    * @param string $podId the Pod ID of the router
    * @param string $projectId list firewall rules by project
    * @param string $state the state of the router
    * @param string $zoneId the Zone ID of the router
    * @param string $page Pagination
    */
    
    public function listRouters($account = "", $domainId = "", $hostId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $networkId = "", $page = "", $pageSize = "", $podId = "", $projectId = "", $state = "", $zoneId = "", $page = "") {

        return $this->request("listRouters", array(
            'account' => $account,
            'domainid' => $domainId,
            'hostid' => $hostId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'networkid' => $networkId,
            'page' => $page,
            'pagesize' => $pageSize,
            'podid' => $podId,
            'projectid' => $projectId,
            'state' => $state,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Create a virtual router element.
    *
    * @param string $nspId the network service provider ID of the virtual router eleme
    *        nt
    */
    
    public function createVirtualRouterElement($nspId) {

        if (empty($nspId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "nspId"), MISSING_ARGUMENT);
        }

        return $this->request("createVirtualRouterElement", array(
            'nspid' => $nspId,
        ));
    }
    
    /**
    * Configures a virtual router element.
    *
    * @param string $id the ID of the virtual router provider
    * @param string $enabled Enabled/Disabled the service provider
    */
    
    public function configureVirtualRouterElement($id, $enabled) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        if (empty($enabled)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "enabled"), MISSING_ARGUMENT);
        }

        return $this->request("configureVirtualRouterElement", array(
            'id' => $id,
            'enabled' => $enabled,
        ));
    }
    
    /**
    * Lists all available virtual router elements.
    *
    * @param string $enabled list network offerings by enabled state
    * @param string $id list virtual router elements by id
    * @param string $keyword List by keyword
    * @param string $nspId list virtual router elements by network service provider id
    *        
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listVirtualRouterElements($enabled = "", $id = "", $keyword = "", $nspId = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listVirtualRouterElements", array(
            'enabled' => $enabled,
            'id' => $id,
            'keyword' => $keyword,
            'nspid' => $nspId,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a project
    *
    * @param string $displayText display text of the project
    * @param string $name name of the project
    * @param string $account account who will be Admin for the project
    * @param string $domainId domain ID of the account owning a project
    */
    
    public function createProject($displayText, $name, $account = "", $domainId = "") {

        if (empty($displayText)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "displayText"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createProject", array(
            'displaytext' => $displayText,
            'name' => $name,
            'account' => $account,
            'domainid' => $domainId,
        ));
    }
    
    /**
    * Deletes a project
    *
    * @param string $id id of the project to be deleted
    */
    
    public function deleteProject($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteProject", array(
            'id' => $id,
        ));
    }
    
    /**
    * Updates a project
    *
    * @param string $id id of the project to be modified
    * @param string $account new Admin account for the project
    * @param string $displayText display text of the project
    */
    
    public function updateProject($id, $account = "", $displayText = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateProject", array(
            'id' => $id,
            'account' => $account,
            'displaytext' => $displayText,
        ));
    }
    
    /**
    * Activates a project
    *
    * @param string $id id of the project to be modified
    */
    
    public function activateProject($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("activateProject", array(
            'id' => $id,
        ));
    }
    
    /**
    * Suspends a project
    *
    * @param string $id id of the project to be suspended
    */
    
    public function suspendProject($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("suspendProject", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists projects and provides detailed information for listed projects
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $displayText list projects by display text
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id list projects by project ID
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name list projects by name
    * @param string $page 
    * @param string $pageSize 
    * @param string $state list projects by state
    * @param string $page Pagination
    */
    
    public function listProjects($account = "", $displayText = "", $domainId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $state = "", $page = "") {

        return $this->request("listProjects", array(
            'account' => $account,
            'displaytext' => $displayText,
            'domainid' => $domainId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'state' => $state,
            'page' => $page,
        ));
    }
    
    /**
    * Lists projects and provides detailed information for listed projects
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $activeOnly if true, list only active invitations - having Pending
    *         state and ones that are not timed out yet
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id list invitations by id
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list by project id
    * @param string $state list invitations by state
    * @param string $page Pagination
    */
    
    public function listProjectInvitations($account = "", $activeOnly = "", $domainId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $projectId = "", $state = "", $page = "") {

        return $this->request("listProjectInvitations", array(
            'account' => $account,
            'activeonly' => $activeOnly,
            'domainid' => $domainId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'state' => $state,
            'page' => $page,
        ));
    }
    
    /**
    * Accepts or declines project invitation
    *
    * @param string $projectId id of the project to join
    * @param string $accept if true, accept the invitation, decline if false. True by 
    *        default
    * @param string $account account that is joining the project
    * @param string $token list invitations for specified account; this parameter has 
    *        to be specified with domainId
    */
    
    public function updateProjectInvitation($projectId, $accept = "", $account = "", $token = "") {

        if (empty($projectId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "projectId"), MISSING_ARGUMENT);
        }

        return $this->request("updateProjectInvitation", array(
            'projectid' => $projectId,
            'accept' => $accept,
            'account' => $account,
            'token' => $token,
        ));
    }
    
    /**
    * Accepts or declines project invitation
    *
    * @param string $id id of the invitation
    */
    
    public function deleteProjectInvitation($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteProjectInvitation", array(
            'id' => $id,
        ));
    }
    
    /**
    * Adds a new host.
    *
    * @param string $hypervisor hypervisor type of the host
    * @param string $password the password for the host
    * @param string $url the host URL
    * @param string $userName the username for the host
    * @param string $zoneId the Zone ID for the host
    * @param string $allocationState Allocation state of this Host for allocation of n
    *        ew resources
    * @param string $clusterId the cluster ID for the host
    * @param string $clusterName the cluster name for the host
    * @param string $hostTags list of tags to be added to the host
    * @param string $podId the Pod ID for the host
    */
    
    public function addHost($hypervisor, $password, $url, $userName, $zoneId, $allocationState = "", $clusterId = "", $clusterName = "", $hostTags = "", $podId = "") {

        if (empty($hypervisor)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "hypervisor"), MISSING_ARGUMENT);
        }

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("addHost", array(
            'hypervisor' => $hypervisor,
            'password' => $password,
            'url' => $url,
            'username' => $userName,
            'zoneid' => $zoneId,
            'allocationstate' => $allocationState,
            'clusterid' => $clusterId,
            'clustername' => $clusterName,
            'hosttags' => $hostTags,
            'podid' => $podId,
        ));
    }
    
    /**
    * Reconnects a host.
    *
    * @param string $id the host ID
    */
    
    public function reconnectHost($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("reconnectHost", array(
            'id' => $id,
        ));
    }
    
    /**
    * Updates a host.
    *
    * @param string $id the ID of the host to update
    * @param string $allocationState Change resource state of host, valid values are [
    *        Enable, Disable]. Operation may failed if host in states not allowing Enable/Dis
    *        able
    * @param string $hostTags list of tags to be added to the host
    * @param string $osCategoryId the id of Os category to update the host with
    * @param string $url the new uri for the secondary storage: nfs://host/path
    */
    
    public function updateHost($id, $allocationState = "", $hostTags = "", $osCategoryId = "", $url = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateHost", array(
            'id' => $id,
            'allocationstate' => $allocationState,
            'hosttags' => $hostTags,
            'oscategoryid' => $osCategoryId,
            'url' => $url,
        ));
    }
    
    /**
    * Deletes a host.
    *
    * @param string $id the host ID
    * @param string $forced Force delete the host. All HA enabled vms running on the h
    *        ost will be put to HA; HA disabled ones will be stopped
    * @param string $forceDestroyLocalStorage Force destroy local storage on this host
    *        . All VMs created on this local storage will be destroyed
    */
    
    public function deleteHost($id, $forced = "", $forceDestroyLocalStorage = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteHost", array(
            'id' => $id,
            'forced' => $forced,
            'forcedestroylocalstorage' => $forceDestroyLocalStorage,
        ));
    }
    
    /**
    * Prepares a host for maintenance.
    *
    * @param string $id the host ID
    */
    
    public function prepareHostForMaintenance($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("prepareHostForMaintenance", array(
            'id' => $id,
        ));
    }
    
    /**
    * Cancels host maintenance.
    *
    * @param string $id the host ID
    */
    
    public function cancelHostMaintenance($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("cancelHostMaintenance", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists hosts.
    *
    * @param string $clusterId lists hosts existing in particular cluster
    * @param string $details comma separated list of host details requested, value can
    *         be a list of [ min, all, capacity, events, stats]
    * @param string $id the id of the host
    * @param string $keyword List by keyword
    * @param string $name the name of the host
    * @param string $page 
    * @param string $pageSize 
    * @param string $podId the Pod ID for the host
    * @param string $resourceState list hosts by resource state. Resource state repres
    *        ents current state determined by admin of host, valule can be one of [Enabled, D
    *        isabled, Unmanaged, PrepareForMaintenance, ErrorInMaintenance, Maintenance, Erro
    *        r]
    * @param string $state the state of the host
    * @param string $type the host type
    * @param string $virtualMachineId lists hosts in the same cluster as this VM and f
    *        lag hosts with enough CPU/RAm to host this VM
    * @param string $zoneId the Zone ID for the host
    * @param string $page Pagination
    */
    
    public function listHosts($clusterId = "", $details = "", $id = "", $keyword = "", $name = "", $page = "", $pageSize = "", $podId = "", $resourceState = "", $state = "", $type = "", $virtualMachineId = "", $zoneId = "", $page = "") {

        return $this->request("listHosts", array(
            'clusterid' => $clusterId,
            'details' => $details,
            'id' => $id,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'podid' => $podId,
            'resourcestate' => $resourceState,
            'state' => $state,
            'type' => $type,
            'virtualmachineid' => $virtualMachineId,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Adds secondary storage.
    *
    * @param string $url the URL for the secondary storage
    * @param string $zoneId the Zone ID for the secondary storage
    */
    
    public function addSecondaryStorage($url, $zoneId = "") {

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        return $this->request("addSecondaryStorage", array(
            'url' => $url,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Update password of a host/pool on management server.
    *
    * @param string $password the new password for the host/cluster
    * @param string $userName the username for the host/cluster
    * @param string $clusterId the cluster ID
    * @param string $hostId the host ID
    */
    
    public function updateHostPassword($password, $userName, $clusterId = "", $hostId = "") {

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        return $this->request("updateHostPassword", array(
            'password' => $password,
            'username' => $userName,
            'clusterid' => $clusterId,
            'hostid' => $hostId,
        ));
    }
    
    /**
    * Creates an account
    *
    * @param string $accountType Type of the account.  Specify 0 for user, 1 for root 
    *        admin, and 2 for domain admin
    * @param string $email email
    * @param string $firstName firstname
    * @param string $lastName lastname
    * @param string $password Hashed password (Default is MD5). If you wish to use any
    *         other hashing algorithm, you would need to write a custom authentication adapte
    *        r See Docs section.
    * @param string $userName Unique username.
    * @param string $account Creates the user under the specified account. If no accou
    *        nt is specified, the username will be used as the account name.
    * @param string $accountDetails details for account used to store specific paramet
    *        ers
    * @param string $domainId Creates the user under the specified domain.
    * @param string $networkDomain Network domain for the account&#039;s networks
    * @param string $timezone Specifies a timezone for this command. For more informat
    *        ion on the timezone parameter, see Time Zone Format.
    */
    
    public function createAccount($accountType, $email, $firstName, $lastName, $password, $userName, $account = "", $accountDetails = "", $domainId = "", $networkDomain = "", $timezone = "") {

        if (empty($accountType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "accountType"), MISSING_ARGUMENT);
        }

        if (empty($email)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "email"), MISSING_ARGUMENT);
        }

        if (empty($firstName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "firstName"), MISSING_ARGUMENT);
        }

        if (empty($lastName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lastName"), MISSING_ARGUMENT);
        }

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        return $this->request("createAccount", array(
            'accounttype' => $accountType,
            'email' => $email,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'password' => $password,
            'username' => $userName,
            'account' => $account,
            'accountdetails' => $accountDetails,
            'domainid' => $domainId,
            'networkdomain' => $networkDomain,
            'timezone' => $timezone,
        ));
    }
    
    /**
    * Deletes a account, and all users associated with this account
    *
    * @param string $id Account id
    */
    
    public function deleteAccount($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteAccount", array(
            'id' => $id,
        ));
    }
    
    /**
    * Updates account information for the authenticated user
    *
    * @param string $newName new name for the account
    * @param string $account the current account name
    * @param string $accountDetails details for account used to store specific paramet
    *        ers
    * @param string $domainId the ID of the domain where the account exists
    * @param string $id Account id
    * @param string $networkDomain Network domain for the account&#039;s networks; emp
    *        ty string will update domainName with NULL value
    */
    
    public function updateAccount($newName, $account = "", $accountDetails = "", $domainId = "", $id = "", $networkDomain = "") {

        if (empty($newName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "newName"), MISSING_ARGUMENT);
        }

        return $this->request("updateAccount", array(
            'newname' => $newName,
            'account' => $account,
            'accountdetails' => $accountDetails,
            'domainid' => $domainId,
            'id' => $id,
            'networkdomain' => $networkDomain,
        ));
    }
    
    /**
    * Disables an account
    *
    * @param string $lock If true, only lock the account; else disable the account
    * @param string $account Disables specified account.
    * @param string $domainId Disables specified account in this domain.
    * @param string $id Account id
    */
    
    public function disableAccount($lock, $account = "", $domainId = "", $id = "") {

        if (empty($lock)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "lock"), MISSING_ARGUMENT);
        }

        return $this->request("disableAccount", array(
            'lock' => $lock,
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
        ));
    }
    
    /**
    * Enables an account
    *
    * @param string $account Enables specified account.
    * @param string $domainId Enables specified account in this domain.
    * @param string $id Account id
    */
    
    public function enableAccount($account = "", $domainId = "", $id = "") {

        return $this->request("enableAccount", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
        ));
    }
    
    /**
    * Lists accounts and provides detailed account information for listed accounts
    *
    * @param string $accountType list accounts by account type. Valid account types ar
    *        e 1 (admin), 2 (domain-admin), and 0 (user).
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id list account by account ID
    * @param string $isCleanUpRequired list accounts by cleanuprequred attribute (valu
    *        es are true or false)
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name list account by account name
    * @param string $page 
    * @param string $pageSize 
    * @param string $state list accounts by state. Valid states are enabled, disabled,
    *         and locked.
    * @param string $page Pagination
    */
    
    public function listAccounts($accountType = "", $domainId = "", $id = "", $isCleanUpRequired = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $state = "", $page = "") {

        return $this->request("listAccounts", array(
            'accounttype' => $accountType,
            'domainid' => $domainId,
            'id' => $id,
            'iscleanuprequired' => $isCleanUpRequired,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'state' => $state,
            'page' => $page,
        ));
    }
    
    /**
    * Adds acoount to a project
    *
    * @param string $projectId id of the project to add the account to
    * @param string $account name of the account to be added to the project
    * @param string $email email to which invitation to the project is going to be sen
    *        t
    */
    
    public function addAccountToProject($projectId, $account = "", $email = "") {

        if (empty($projectId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "projectId"), MISSING_ARGUMENT);
        }

        return $this->request("addAccountToProject", array(
            'projectid' => $projectId,
            'account' => $account,
            'email' => $email,
        ));
    }
    
    /**
    * Deletes account from the project
    *
    * @param string $account name of the account to be removed from the project
    * @param string $projectId id of the project to remove the account from
    */
    
    public function deleteAccountFromProject($account, $projectId) {

        if (empty($account)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "account"), MISSING_ARGUMENT);
        }

        if (empty($projectId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "projectId"), MISSING_ARGUMENT);
        }

        return $this->request("deleteAccountFromProject", array(
            'account' => $account,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Lists project's accounts
    *
    * @param string $projectId id of the project
    * @param string $account list accounts of the project by account name
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $role list accounts of the project by role
    * @param string $page Pagination
    */
    
    public function listProjectAccounts($projectId, $account = "", $keyword = "", $page = "", $pageSize = "", $role = "", $page = "") {

        if (empty($projectId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "projectId"), MISSING_ARGUMENT);
        }

        return $this->request("listProjectAccounts", array(
            'projectid' => $projectId,
            'account' => $account,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'role' => $role,
            'page' => $page,
        ));
    }
    
    /**
    * Lists storage pools.
    *
    * @param string $clusterId list storage pools belongig to the specific cluster
    * @param string $id the ID of the storage pool
    * @param string $ipAddress the IP address for the storage pool
    * @param string $keyword List by keyword
    * @param string $name the name of the storage pool
    * @param string $page 
    * @param string $pageSize 
    * @param string $path the storage pool path
    * @param string $podId the Pod ID for the storage pool
    * @param string $zoneId the Zone ID for the storage pool
    * @param string $page Pagination
    */
    
    public function listStoragePools($clusterId = "", $id = "", $ipAddress = "", $keyword = "", $name = "", $page = "", $pageSize = "", $path = "", $podId = "", $zoneId = "", $page = "") {

        return $this->request("listStoragePools", array(
            'clusterid' => $clusterId,
            'id' => $id,
            'ipaddress' => $ipAddress,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'path' => $path,
            'podid' => $podId,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a storage pool.
    *
    * @param string $name the name for the storage pool
    * @param string $url the URL of the storage pool
    * @param string $zoneId the Zone ID for the storage pool
    * @param string $clusterId the cluster ID for the storage pool
    * @param string $details the details for the storage pool
    * @param string $podId the Pod ID for the storage pool
    * @param string $tags the tags for the storage pool
    */
    
    public function createStoragePool($name, $url, $zoneId, $clusterId = "", $details = "", $podId = "", $tags = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("createStoragePool", array(
            'name' => $name,
            'url' => $url,
            'zoneid' => $zoneId,
            'clusterid' => $clusterId,
            'details' => $details,
            'podid' => $podId,
            'tags' => $tags,
        ));
    }
    
    /**
    * Updates a storage pool.
    *
    * @param string $id the Id of the storage pool
    * @param string $tags comma-separated list of tags for the storage pool
    */
    
    public function updateStoragePool($id, $tags = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateStoragePool", array(
            'id' => $id,
            'tags' => $tags,
        ));
    }
    
    /**
    * Deletes a storage pool.
    *
    * @param string $id Storage pool id
    */
    
    public function deleteStoragePool($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteStoragePool", array(
            'id' => $id,
        ));
    }
    
    /**
    * Create a pool
    *
    * @param string $algorithm algorithm.
    * @param string $name pool name.
    */
    
    public function createPool($algorithm, $name) {

        if (empty($algorithm)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "algorithm"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createPool", array(
            'algorithm' => $algorithm,
            'name' => $name,
        ));
    }
    
    /**
    * Delete a pool
    *
    * @param string $poolName pool name.
    */
    
    public function deletePool($poolName) {

        if (empty($poolName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "poolName"), MISSING_ARGUMENT);
        }

        return $this->request("deletePool", array(
            'poolname' => $poolName,
        ));
    }
    
    /**
    * Modify pool
    *
    * @param string $algorithm algorithm.
    * @param string $poolName pool name.
    */
    
    public function modifyPool($algorithm, $poolName) {

        if (empty($algorithm)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "algorithm"), MISSING_ARGUMENT);
        }

        if (empty($poolName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "poolName"), MISSING_ARGUMENT);
        }

        return $this->request("modifyPool", array(
            'algorithm' => $algorithm,
            'poolname' => $poolName,
        ));
    }
    
    /**
    * List Pool
    *
    * @param string $page Pagination
    */
    
    public function listPools($page = "") {

        return $this->request("listPools", array(
            'page' => $page,
        ));
    }
    
    /**
    * Creates a security group
    *
    * @param string $name name of the security group
    * @param string $account an optional account for the security group. Must be used 
    *        with domainId.
    * @param string $description the description of the security group
    * @param string $domainId an optional domainId for the security group. If the acco
    *        unt parameter is used, domainId must also be used.
    * @param string $projectId Deploy vm for the project
    */
    
    public function createSecurityGroup($name, $account = "", $description = "", $domainId = "", $projectId = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createSecurityGroup", array(
            'name' => $name,
            'account' => $account,
            'description' => $description,
            'domainid' => $domainId,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Deletes security group
    *
    * @param string $account the account of the security group. Must be specified with
    *         domain ID
    * @param string $domainId the domain ID of account owning the security group
    * @param string $id The ID of the security group. Mutually exclusive with name par
    *        ameter
    * @param string $name The ID of the security group. Mutually exclusive with id par
    *        ameter
    * @param string $projectId the project of the security group
    */
    
    public function deleteSecurityGroup($account = "", $domainId = "", $id = "", $name = "", $projectId = "") {

        return $this->request("deleteSecurityGroup", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'name' => $name,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Authorizes a particular ingress rule for this security group
    *
    * @param string $account an optional account for the security group. Must be used 
    *        with domainId.
    * @param string $cidrList the cidr list associated
    * @param string $domainId an optional domainId for the security group. If the acco
    *        unt parameter is used, domainId must also be used.
    * @param string $endPort end port for this ingress rule
    * @param string $icmpCode error code for this icmp message
    * @param string $icmpType type of the icmp message being sent
    * @param string $projectId an optional project of the security group
    * @param string $protocol TCP is default. UDP is the other supported protocol
    * @param string $securityGroupId The ID of the security group. Mutually exclusive 
    *        with securityGroupName parameter
    * @param string $securityGroupName The name of the security group. Mutually exclus
    *        ive with securityGroupName parameter
    * @param string $startPort start port for this ingress rule
    * @param string $userSecurityGroupList user to security group mapping
    */
    
    public function authorizeSecurityGroupIngress($account = "", $cidrList = "", $domainId = "", $endPort = "", $icmpCode = "", $icmpType = "", $projectId = "", $protocol = "", $securityGroupId = "", $securityGroupName = "", $startPort = "", $userSecurityGroupList = "") {

        return $this->request("authorizeSecurityGroupIngress", array(
            'account' => $account,
            'cidrlist' => $cidrList,
            'domainid' => $domainId,
            'endport' => $endPort,
            'icmpcode' => $icmpCode,
            'icmptype' => $icmpType,
            'projectid' => $projectId,
            'protocol' => $protocol,
            'securitygroupid' => $securityGroupId,
            'securitygroupname' => $securityGroupName,
            'startport' => $startPort,
            'usersecuritygrouplist' => $userSecurityGroupList,
        ));
    }
    
    /**
    * Deletes a particular ingress rule from this security group
    *
    * @param string $id The ID of the ingress rule
    */
    
    public function revokeSecurityGroupIngress($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("revokeSecurityGroupIngress", array(
            'id' => $id,
        ));
    }
    
    /**
    * Authorizes a particular egress rule for this security group
    *
    * @param string $account an optional account for the security group. Must be used 
    *        with domainId.
    * @param string $cidrList the cidr list associated
    * @param string $domainId an optional domainId for the security group. If the acco
    *        unt parameter is used, domainId must also be used.
    * @param string $endPort end port for this egress rule
    * @param string $icmpCode error code for this icmp message
    * @param string $icmpType type of the icmp message being sent
    * @param string $projectId an optional project of the security group
    * @param string $protocol TCP is default. UDP is the other supported protocol
    * @param string $securityGroupId The ID of the security group. Mutually exclusive 
    *        with securityGroupName parameter
    * @param string $securityGroupName The name of the security group. Mutually exclus
    *        ive with securityGroupName parameter
    * @param string $startPort start port for this egress rule
    * @param string $userSecurityGroupList user to security group mapping
    */
    
    public function authorizeSecurityGroupEgress($account = "", $cidrList = "", $domainId = "", $endPort = "", $icmpCode = "", $icmpType = "", $projectId = "", $protocol = "", $securityGroupId = "", $securityGroupName = "", $startPort = "", $userSecurityGroupList = "") {

        return $this->request("authorizeSecurityGroupEgress", array(
            'account' => $account,
            'cidrlist' => $cidrList,
            'domainid' => $domainId,
            'endport' => $endPort,
            'icmpcode' => $icmpCode,
            'icmptype' => $icmpType,
            'projectid' => $projectId,
            'protocol' => $protocol,
            'securitygroupid' => $securityGroupId,
            'securitygroupname' => $securityGroupName,
            'startport' => $startPort,
            'usersecuritygrouplist' => $userSecurityGroupList,
        ));
    }
    
    /**
    * Deletes a particular egress rule from this security group
    *
    * @param string $id The ID of the egress rule
    */
    
    public function revokeSecurityGroupEgress($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("revokeSecurityGroupEgress", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists security groups
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id list the security group by the id provided
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $securityGroupName lists security groups by name
    * @param string $virtualMachineId lists security groups by virtual machine id
    * @param string $page Pagination
    */
    
    public function listSecurityGroups($account = "", $domainId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $projectId = "", $securityGroupName = "", $virtualMachineId = "", $page = "") {

        return $this->request("listSecurityGroups", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'securitygroupname' => $securityGroupName,
            'virtualmachineid' => $virtualMachineId,
            'page' => $page,
        ));
    }
    
    /**
    * Starts a system virtual machine.
    *
    * @param string $id The ID of the system virtual machine
    */
    
    public function startSystemVm($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("startSystemVm", array(
            'id' => $id,
        ));
    }
    
    /**
    * Reboots a system VM.
    *
    * @param string $id The ID of the system virtual machine
    */
    
    public function rebootSystemVm($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("rebootSystemVm", array(
            'id' => $id,
        ));
    }
    
    /**
    * Stops a system VM.
    *
    * @param string $id The ID of the system virtual machine
    * @param string $forced Force stop the VM.  The caller knows the VM is stopped.
    */
    
    public function stopSystemVm($id, $forced = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("stopSystemVm", array(
            'id' => $id,
            'forced' => $forced,
        ));
    }
    
    /**
    * Destroyes a system virtual machine.
    *
    * @param string $id The ID of the system virtual machine
    */
    
    public function destroySystemVm($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("destroySystemVm", array(
            'id' => $id,
        ));
    }
    
    /**
    * List system virtual machines.
    *
    * @param string $hostId the host ID of the system VM
    * @param string $id the ID of the system VM
    * @param string $keyword List by keyword
    * @param string $name the name of the system VM
    * @param string $page 
    * @param string $pageSize 
    * @param string $podId the Pod ID of the system VM
    * @param string $state the state of the system VM
    * @param string $systemVmType the system VM type. Possible types are &quot;console
    *        proxy&quot; and &quot;secondarystoragevm&quot;.
    * @param string $zoneId the Zone ID of the system VM
    * @param string $page Pagination
    */
    
    public function listSystemVms($hostId = "", $id = "", $keyword = "", $name = "", $page = "", $pageSize = "", $podId = "", $state = "", $systemVmType = "", $zoneId = "", $page = "") {

        return $this->request("listSystemVms", array(
            'hostid' => $hostId,
            'id' => $id,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'podid' => $podId,
            'state' => $state,
            'systemvmtype' => $systemVmType,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Attempts Migration of a system virtual machine to the host specified.
    *
    * @param string $hostId destination Host ID to migrate VM to
    * @param string $virtualMachineId the ID of the virtual machine
    */
    
    public function migrateSystemVm($hostId, $virtualMachineId) {

        if (empty($hostId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "hostId"), MISSING_ARGUMENT);
        }

        if (empty($virtualMachineId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineId"), MISSING_ARGUMENT);
        }

        return $this->request("migrateSystemVm", array(
            'hostid' => $hostId,
            'virtualmachineid' => $virtualMachineId,
        ));
    }
    
    /**
    * Creates an instant snapshot of a volume.
    *
    * @param string $volumeId The ID of the disk volume
    * @param string $account The account of the snapshot. The account parameter must b
    *        e used with the domainId parameter.
    * @param string $domainId The domain ID of the snapshot. If used with the account 
    *        parameter, specifies a domain for the account associated with the disk volume.
    * @param string $policyId policy id of the snapshot, if this is null, then use MAN
    *        UAL_POLICY.
    */
    
    public function createSnapshot($volumeId, $account = "", $domainId = "", $policyId = "") {

        if (empty($volumeId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "volumeId"), MISSING_ARGUMENT);
        }

        return $this->request("createSnapshot", array(
            'volumeid' => $volumeId,
            'account' => $account,
            'domainid' => $domainId,
            'policyid' => $policyId,
        ));
    }
    
    /**
    * Lists all available snapshots for the account.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id lists snapshot by snapshot ID
    * @param string $intervalType valid values are HOURLY, DAILY, WEEKLY, and MONTHLY.
    *        
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name lists snapshot by snapshot name
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $snapshotType valid values are MANUAL or RECURRING.
    * @param string $volumeId the ID of the disk volume
    * @param string $page Pagination
    */
    
    public function listSnapshots($account = "", $domainId = "", $id = "", $intervalType = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $projectId = "", $snapshotType = "", $volumeId = "", $page = "") {

        return $this->request("listSnapshots", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'intervaltype' => $intervalType,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'snapshottype' => $snapshotType,
            'volumeid' => $volumeId,
            'page' => $page,
        ));
    }
    
    /**
    * Deletes a snapshot of a disk volume.
    *
    * @param string $id The ID of the snapshot
    */
    
    public function deleteSnapshot($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteSnapshot", array(
            'id' => $id,
        ));
    }
    
    /**
    * Creates a snapshot policy for the account.
    *
    * @param string $intervalType valid values are HOURLY, DAILY, WEEKLY, and MONTHLY
    * @param string $maxSnaps maximum number of snapshots to retain
    * @param string $schedule time the snapshot is scheduled to be taken. Format is:* 
    *        if HOURLY, MM* if DAILY, MM:HH* if WEEKLY, MM:HH:DD (1-7)* if MONTHLY, MM:HH:DD 
    *        (1-28)
    * @param string $timezone Specifies a timezone for this command. For more informat
    *        ion on the timezone parameter, see Time Zone Format.
    * @param string $volumeId the ID of the disk volume
    */
    
    public function createSnapshotPolicy($intervalType, $maxSnaps, $schedule, $timezone, $volumeId) {

        if (empty($intervalType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "intervalType"), MISSING_ARGUMENT);
        }

        if (empty($maxSnaps)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "maxSnaps"), MISSING_ARGUMENT);
        }

        if (empty($schedule)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "schedule"), MISSING_ARGUMENT);
        }

        if (empty($timezone)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "timezone"), MISSING_ARGUMENT);
        }

        if (empty($volumeId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "volumeId"), MISSING_ARGUMENT);
        }

        return $this->request("createSnapshotPolicy", array(
            'intervaltype' => $intervalType,
            'maxsnaps' => $maxSnaps,
            'schedule' => $schedule,
            'timezone' => $timezone,
            'volumeid' => $volumeId,
        ));
    }
    
    /**
    * Deletes snapshot policies for the account.
    *
    * @param string $id the Id of the snapshot policy
    * @param string $ids list of snapshots policy IDs separated by comma
    */
    
    public function deleteSnapshotPolicies($id = "", $ids = "") {

        return $this->request("deleteSnapshotPolicies", array(
            'id' => $id,
            'ids' => $ids,
        ));
    }
    
    /**
    * Lists snapshot policies.
    *
    * @param string $volumeId the ID of the disk volume
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listSnapshotPolicies($volumeId, $keyword = "", $page = "", $pageSize = "", $page = "") {

        if (empty($volumeId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "volumeId"), MISSING_ARGUMENT);
        }

        return $this->request("listSnapshotPolicies", array(
            'volumeid' => $volumeId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Create a LUN from a pool
    *
    * @param string $name pool name.
    * @param string $size LUN size.
    */
    
    public function createLunOnFiler($name, $size) {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($size)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "size"), MISSING_ARGUMENT);
        }

        return $this->request("createLunOnFiler", array(
            'name' => $name,
            'size' => $size,
        ));
    }
    
    /**
    * Destroy a LUN
    *
    * @param string $path LUN path.
    */
    
    public function destroyLunOnFiler($path) {

        if (empty($path)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "path"), MISSING_ARGUMENT);
        }

        return $this->request("destroyLunOnFiler", array(
            'path' => $path,
        ));
    }
    
    /**
    * List LUN
    *
    * @param string $poolName pool name.
    * @param string $page Pagination
    */
    
    public function listLunsOnFiler($poolName, $page = "") {

        if (empty($poolName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "poolName"), MISSING_ARGUMENT);
        }

        return $this->request("listLunsOnFiler", array(
            'poolname' => $poolName,
            'page' => $page,
        ));
    }
    
    /**
    * Associate a LUN with a guest IQN
    *
    * @param string $iqn Guest IQN to which the LUN associate.
    * @param string $name LUN name.
    */
    
    public function associateLun($iqn, $name) {

        if (empty($iqn)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "iqn"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("associateLun", array(
            'iqn' => $iqn,
            'name' => $name,
        ));
    }
    
    /**
    * Dissociate a LUN
    *
    * @param string $iqn Guest IQN.
    * @param string $path LUN path.
    */
    
    public function dissociateLun($iqn, $path) {

        if (empty($iqn)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "iqn"), MISSING_ARGUMENT);
        }

        if (empty($path)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "path"), MISSING_ARGUMENT);
        }

        return $this->request("dissociateLun", array(
            'iqn' => $iqn,
            'path' => $path,
        ));
    }
    
    /**
    * Enables static nat for given ip address
    *
    * @param string $ipAddressId the public IP address id for which static nat feature
    *         is being enabled
    * @param string $virtualMachineId the ID of the virtual machine for enabling stati
    *        c nat feature
    */
    
    public function enableStaticNat($ipAddressId, $virtualMachineId) {

        if (empty($ipAddressId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "ipAddressId"), MISSING_ARGUMENT);
        }

        if (empty($virtualMachineId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "virtualMachineId"), MISSING_ARGUMENT);
        }

        return $this->request("enableStaticNat", array(
            'ipaddressid' => $ipAddressId,
            'virtualmachineid' => $virtualMachineId,
        ));
    }
    
    /**
    * Creates an ip forwarding rule
    *
    * @param string $ipAddressId the public IP address id of the forwarding rule, alre
    *        ady associated via associateIp
    * @param string $protocol the protocol for the rule. Valid values are TCP or UDP.
    * @param string $startPort the start port for the rule
    * @param string $cidrList the cidr list to forward traffic from
    * @param string $endPort the end port for the rule
    * @param string $openFirewall if true, firewall rule for source/end pubic port is 
    *        automatically created; if false - firewall rule has to be created explicitely. H
    *        as value true by default
    */
    
    public function createIpForwardingRule($ipAddressId, $protocol, $startPort, $cidrList = "", $endPort = "", $openFirewall = "") {

        if (empty($ipAddressId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "ipAddressId"), MISSING_ARGUMENT);
        }

        if (empty($protocol)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "protocol"), MISSING_ARGUMENT);
        }

        if (empty($startPort)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "startPort"), MISSING_ARGUMENT);
        }

        return $this->request("createIpForwardingRule", array(
            'ipaddressid' => $ipAddressId,
            'protocol' => $protocol,
            'startport' => $startPort,
            'cidrlist' => $cidrList,
            'endport' => $endPort,
            'openfirewall' => $openFirewall,
        ));
    }
    
    /**
    * Deletes an ip forwarding rule
    *
    * @param string $id the id of the forwarding rule
    */
    
    public function deleteIpForwardingRule($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteIpForwardingRule", array(
            'id' => $id,
        ));
    }
    
    /**
    * List the ip forwarding rules
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id Lists rule with the specified ID.
    * @param string $ipAddressId list the rule belonging to this public ip address
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $virtualMachineId Lists all rules applied to the specified Vm.
    * @param string $page Pagination
    */
    
    public function listIpForwardingRules($account = "", $domainId = "", $id = "", $ipAddressId = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $projectId = "", $virtualMachineId = "", $page = "") {

        return $this->request("listIpForwardingRules", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'ipaddressid' => $ipAddressId,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'virtualmachineid' => $virtualMachineId,
            'page' => $page,
        ));
    }
    
    /**
    * Disables static rule for given ip address
    *
    * @param string $ipAddressId the public IP address id for which static nat feature
    *         is being disableed
    */
    
    public function disableStaticNat($ipAddressId) {

        if (empty($ipAddressId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "ipAddressId"), MISSING_ARGUMENT);
        }

        return $this->request("disableStaticNat", array(
            'ipaddressid' => $ipAddressId,
        ));
    }
    
    /**
    * Creates a domain
    *
    * @param string $name creates domain with this name
    * @param string $networkDomain Network domain for networks in the domain
    * @param string $parentDomainId assigns new domain a parent domain by domain ID of
    *         the parent.  If no parent domain is specied, the ROOT domain is assumed.
    */
    
    public function createDomain($name, $networkDomain = "", $parentDomainId = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createDomain", array(
            'name' => $name,
            'networkdomain' => $networkDomain,
            'parentdomainid' => $parentDomainId,
        ));
    }
    
    /**
    * Updates a domain with a new name
    *
    * @param string $id ID of domain to update
    * @param string $name updates domain with this name
    * @param string $networkDomain Network domain for the domain&#039;s networks; empt
    *        y string will update domainName with NULL value
    */
    
    public function updateDomain($id, $name = "", $networkDomain = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateDomain", array(
            'id' => $id,
            'name' => $name,
            'networkdomain' => $networkDomain,
        ));
    }
    
    /**
    * Deletes a specified domain
    *
    * @param string $id ID of domain to delete
    * @param string $cleanup true if all domain resources (child domains, accounts) ha
    *        ve to be cleaned up, false otherwise
    */
    
    public function deleteDomain($id, $cleanup = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteDomain", array(
            'id' => $id,
            'cleanup' => $cleanup,
        ));
    }
    
    /**
    * Lists domains and provides detailed information for listed domains
    *
    * @param string $id List domain by domain ID.
    * @param string $keyword List by keyword
    * @param string $level List domains by domain level.
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name List domain by domain name.
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listDomains($id = "", $keyword = "", $level = "", $listAll = "", $name = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listDomains", array(
            'id' => $id,
            'keyword' => $keyword,
            'level' => $level,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Lists all children domains belonging to a specified domain
    *
    * @param string $id list children domain by parent domain ID.
    * @param string $isRecursive to return the entire tree, use the value &quot;true&q
    *        uot;. To return the first level children, use the value &quot;false&quot;.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name list children domains by name
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listDomainChildren($id = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listDomainChildren", array(
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a Zone.
    *
    * @param string $dns1 the first DNS for the Zone
    * @param string $internalDns1 the first internal DNS for the Zone
    * @param string $name the name of the Zone
    * @param string $networkType network type of the zone, can be Basic or Advanced
    * @param string $allocationState Allocation state of this Zone for allocation of n
    *        ew resources
    * @param string $dns2 the second DNS for the Zone
    * @param string $domain Network domain name for the networks in the zone
    * @param string $domainId the ID of the containing domain, null for public zones
    * @param string $guestCidrAddress the guest CIDR address for the Zone
    * @param string $internalDns2 the second internal DNS for the Zone
    * @param string $securityGroupEnabled true if network is security group enabled, f
    *        alse otherwise
    */
    
    public function createZone($dns1, $internalDns1, $name, $networkType, $allocationState = "", $dns2 = "", $domain = "", $domainId = "", $guestCidrAddress = "", $internalDns2 = "", $securityGroupEnabled = "") {

        if (empty($dns1)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "dns1"), MISSING_ARGUMENT);
        }

        if (empty($internalDns1)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "internalDns1"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($networkType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "networkType"), MISSING_ARGUMENT);
        }

        return $this->request("createZone", array(
            'dns1' => $dns1,
            'internaldns1' => $internalDns1,
            'name' => $name,
            'networktype' => $networkType,
            'allocationstate' => $allocationState,
            'dns2' => $dns2,
            'domain' => $domain,
            'domainid' => $domainId,
            'guestcidraddress' => $guestCidrAddress,
            'internaldns2' => $internalDns2,
            'securitygroupenabled' => $securityGroupEnabled,
        ));
    }
    
    /**
    * Updates a Zone.
    *
    * @param string $id the ID of the Zone
    * @param string $allocationState Allocation state of this cluster for allocation o
    *        f new resources
    * @param string $details the details for the Zone
    * @param string $dhcpProvider the dhcp Provider for the Zone
    * @param string $dns1 the first DNS for the Zone
    * @param string $dns2 the second DNS for the Zone
    * @param string $dnsSearchOrder the dns search order list
    * @param string $domain Network domain name for the networks in the zone; empty st
    *        ring will update domain with NULL value
    * @param string $guestCidrAddress the guest CIDR address for the Zone
    * @param string $internalDns1 the first internal DNS for the Zone
    * @param string $internalDns2 the second internal DNS for the Zone
    * @param string $isPublic updates a private zone to public if set, but not vice-ve
    *        rsa
    * @param string $name the name of the Zone
    */
    
    public function updateZone($id, $allocationState = "", $details = "", $dhcpProvider = "", $dns1 = "", $dns2 = "", $dnsSearchOrder = "", $domain = "", $guestCidrAddress = "", $internalDns1 = "", $internalDns2 = "", $isPublic = "", $name = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateZone", array(
            'id' => $id,
            'allocationstate' => $allocationState,
            'details' => $details,
            'dhcpprovider' => $dhcpProvider,
            'dns1' => $dns1,
            'dns2' => $dns2,
            'dnssearchorder' => $dnsSearchOrder,
            'domain' => $domain,
            'guestcidraddress' => $guestCidrAddress,
            'internaldns1' => $internalDns1,
            'internaldns2' => $internalDns2,
            'ispublic' => $isPublic,
            'name' => $name,
        ));
    }
    
    /**
    * Deletes a Zone.
    *
    * @param string $id the ID of the Zone
    */
    
    public function deleteZone($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteZone", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists zones
    *
    * @param string $available true if you want to retrieve all available Zones. False
    *         if you only want to return the Zones from which you have at least one VM. Defau
    *        lt is false.
    * @param string $domainId the ID of the domain associated with the zone
    * @param string $id the ID of the zone
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $showCapacities flag to display the capacity of the zones
    * @param string $page Pagination
    */
    
    public function listZones($available = "", $domainId = "", $id = "", $keyword = "", $page = "", $pageSize = "", $showCapacities = "", $page = "") {

        return $this->request("listZones", array(
            'available' => $available,
            'domainid' => $domainId,
            'id' => $id,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'showcapacities' => $showCapacities,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a vm group
    *
    * @param string $name the name of the instance group
    * @param string $account the account of the instance group. The account parameter 
    *        must be used with the domainId parameter.
    * @param string $domainId the domain ID of account owning the instance group
    * @param string $projectId The project of the instance group
    */
    
    public function createInstanceGroup($name, $account = "", $domainId = "", $projectId = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createInstanceGroup", array(
            'name' => $name,
            'account' => $account,
            'domainid' => $domainId,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Deletes a vm group
    *
    * @param string $id the ID of the instance group
    */
    
    public function deleteInstanceGroup($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteInstanceGroup", array(
            'id' => $id,
        ));
    }
    
    /**
    * Updates a vm group
    *
    * @param string $id Instance group ID
    * @param string $name new instance group name
    */
    
    public function updateInstanceGroup($id, $name = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateInstanceGroup", array(
            'id' => $id,
            'name' => $name,
        ));
    }
    
    /**
    * Lists vm groups
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id list instance groups by ID
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name list instance groups by name
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $page Pagination
    */
    
    public function listInstanceGroups($account = "", $domainId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $projectId = "", $page = "") {

        return $this->request("listInstanceGroups", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a service offering.
    *
    * @param string $cpuNumber the CPU number of the service offering
    * @param string $cpuSpeed the CPU speed of the service offering in MHz.
    * @param string $displayText the display text of the service offering
    * @param string $memory the total memory of the service offering in MB
    * @param string $name the name of the service offering
    * @param string $domainId the ID of the containing domain, null for public offerin
    *        gs
    * @param string $hostTags the host tag for this service offering.
    * @param string $isSystem is this a system vm offering
    * @param string $limitCpuUse restrict the CPU usage to committed service offering
    * @param string $networkRate data transfer rate in megabits per second allowed. Su
    *        pported only for non-System offering and system offerings having &quot;domainrou
    *        ter&quot; systemvmtype
    * @param string $offerHa the HA for the service offering
    * @param string $storageType the storage type of the service offering. Values are 
    *        local and shared.
    * @param string $systemVmType the system VM type. Possible types are &quot;domainr
    *        outer&quot;, &quot;consoleproxy&quot; and &quot;secondarystoragevm&quot;.
    * @param string $tags the tags for this service offering.
    */
    
    public function createServiceOffering($cpuNumber, $cpuSpeed, $displayText, $memory, $name, $domainId = "", $hostTags = "", $isSystem = "", $limitCpuUse = "", $networkRate = "", $offerHa = "", $storageType = "", $systemVmType = "", $tags = "") {

        if (empty($cpuNumber)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "cpuNumber"), MISSING_ARGUMENT);
        }

        if (empty($cpuSpeed)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "cpuSpeed"), MISSING_ARGUMENT);
        }

        if (empty($displayText)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "displayText"), MISSING_ARGUMENT);
        }

        if (empty($memory)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "memory"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createServiceOffering", array(
            'cpunumber' => $cpuNumber,
            'cpuspeed' => $cpuSpeed,
            'displaytext' => $displayText,
            'memory' => $memory,
            'name' => $name,
            'domainid' => $domainId,
            'hosttags' => $hostTags,
            'issystem' => $isSystem,
            'limitcpuuse' => $limitCpuUse,
            'networkrate' => $networkRate,
            'offerha' => $offerHa,
            'storagetype' => $storageType,
            'systemvmtype' => $systemVmType,
            'tags' => $tags,
        ));
    }
    
    /**
    * Deletes a service offering.
    *
    * @param string $id the ID of the service offering
    */
    
    public function deleteServiceOffering($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteServiceOffering", array(
            'id' => $id,
        ));
    }
    
    /**
    * Updates a service offering.
    *
    * @param string $id the ID of the service offering to be updated
    * @param string $displayText the display text of the service offering to be update
    *        d
    * @param string $name the name of the service offering to be updated
    * @param string $sortKey sort key of the service offering, integer
    */
    
    public function updateServiceOffering($id, $displayText = "", $name = "", $sortKey = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateServiceOffering", array(
            'id' => $id,
            'displaytext' => $displayText,
            'name' => $name,
            'sortkey' => $sortKey,
        ));
    }
    
    /**
    * Lists all available service offerings.
    *
    * @param string $domainId the ID of the domain associated with the service offerin
    *        g
    * @param string $id ID of the service offering
    * @param string $isSystem is this a system vm offering
    * @param string $keyword List by keyword
    * @param string $name name of the service offering
    * @param string $page 
    * @param string $pageSize 
    * @param string $systemVmType the system VM type. Possible types are &quot;console
    *        proxy&quot;, &quot;secondarystoragevm&quot; or &quot;domainrouter&quot;.
    * @param string $virtualMachineId the ID of the virtual machine. Pass this in if y
    *        ou want to see the available service offering that a virtual machine can be chan
    *        ged to.
    * @param string $page Pagination
    */
    
    public function listServiceOfferings($domainId = "", $id = "", $isSystem = "", $keyword = "", $name = "", $page = "", $pageSize = "", $systemVmType = "", $virtualMachineId = "", $page = "") {

        return $this->request("listServiceOfferings", array(
            'domainid' => $domainId,
            'id' => $id,
            'issystem' => $isSystem,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'systemvmtype' => $systemVmType,
            'virtualmachineid' => $virtualMachineId,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a new Pod.
    *
    * @param string $gateway the gateway for the Pod
    * @param string $name the name of the Pod
    * @param string $netmask the netmask for the Pod
    * @param string $startIp the starting IP address for the Pod
    * @param string $zoneId the Zone ID in which the Pod will be created
    * @param string $allocationState Allocation state of this Pod for allocation of ne
    *        w resources
    * @param string $endIp the ending IP address for the Pod
    */
    
    public function createPod($gateway, $name, $netmask, $startIp, $zoneId, $allocationState = "", $endIp = "") {

        if (empty($gateway)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "gateway"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($netmask)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "netmask"), MISSING_ARGUMENT);
        }

        if (empty($startIp)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "startIp"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("createPod", array(
            'gateway' => $gateway,
            'name' => $name,
            'netmask' => $netmask,
            'startip' => $startIp,
            'zoneid' => $zoneId,
            'allocationstate' => $allocationState,
            'endip' => $endIp,
        ));
    }
    
    /**
    * Updates a Pod.
    *
    * @param string $id the ID of the Pod
    * @param string $allocationState Allocation state of this cluster for allocation o
    *        f new resources
    * @param string $endIp the ending IP address for the Pod
    * @param string $gateway the gateway for the Pod
    * @param string $name the name of the Pod
    * @param string $netmask the netmask of the Pod
    * @param string $startIp the starting IP address for the Pod
    */
    
    public function updatePod($id, $allocationState = "", $endIp = "", $gateway = "", $name = "", $netmask = "", $startIp = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updatePod", array(
            'id' => $id,
            'allocationstate' => $allocationState,
            'endip' => $endIp,
            'gateway' => $gateway,
            'name' => $name,
            'netmask' => $netmask,
            'startip' => $startIp,
        ));
    }
    
    /**
    * Deletes a Pod.
    *
    * @param string $id the ID of the Pod
    */
    
    public function deletePod($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deletePod", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists all Pods.
    *
    * @param string $allocationState list pods by allocation state
    * @param string $id list Pods by ID
    * @param string $keyword List by keyword
    * @param string $name list Pods by name
    * @param string $page 
    * @param string $pageSize 
    * @param string $showCapacities flag to display the capacity of the pods
    * @param string $zoneId list Pods by Zone ID
    * @param string $page Pagination
    */
    
    public function listPods($allocationState = "", $id = "", $keyword = "", $name = "", $page = "", $pageSize = "", $showCapacities = "", $zoneId = "", $page = "") {

        return $this->request("listPods", array(
            'allocationstate' => $allocationState,
            'id' => $id,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'showcapacities' => $showCapacities,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a disk offering.
    *
    * @param string $displayText alternate display text of the disk offering
    * @param string $name name of the disk offering
    * @param string $customized whether disk offering is custom or not
    * @param string $diskSize size of the disk offering in GB
    * @param string $domainId the ID of the containing domain, null for public offerin
    *        gs
    * @param string $tags tags for the disk offering
    */
    
    public function createDiskOffering($displayText, $name, $customized = "", $diskSize = "", $domainId = "", $tags = "") {

        if (empty($displayText)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "displayText"), MISSING_ARGUMENT);
        }

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createDiskOffering", array(
            'displaytext' => $displayText,
            'name' => $name,
            'customized' => $customized,
            'disksize' => $diskSize,
            'domainid' => $domainId,
            'tags' => $tags,
        ));
    }
    
    /**
    * Updates a disk offering.
    *
    * @param string $id ID of the disk offering
    * @param string $displayText updates alternate display text of the disk offering w
    *        ith this value
    * @param string $name updates name of the disk offering with this value
    * @param string $sortKey sort key of the disk offering, integer
    */
    
    public function updateDiskOffering($id, $displayText = "", $name = "", $sortKey = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateDiskOffering", array(
            'id' => $id,
            'displaytext' => $displayText,
            'name' => $name,
            'sortkey' => $sortKey,
        ));
    }
    
    /**
    * Updates a disk offering.
    *
    * @param string $id ID of the disk offering
    */
    
    public function deleteDiskOffering($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteDiskOffering", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists all available disk offerings.
    *
    * @param string $domainId the ID of the domain of the disk offering.
    * @param string $id ID of the disk offering
    * @param string $keyword List by keyword
    * @param string $name name of the disk offering
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listDiskOfferings($domainId = "", $id = "", $keyword = "", $name = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listDiskOfferings", array(
            'domainid' => $domainId,
            'id' => $id,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Adds a new cluster
    *
    * @param string $clusterName the cluster name
    * @param string $clusterType type of the cluster: CloudManaged, ExternalManaged
    * @param string $hypervisor hypervisor type of the cluster: XenServer,KVM,VMware,H
    *        yperv,BareMetal,Simulator
    * @param string $zoneId the Zone ID for the cluster
    * @param string $allocationState Allocation state of this cluster for allocation o
    *        f new resources
    * @param string $password the password for the host
    * @param string $podId the Pod ID for the host
    * @param string $url the URL
    * @param string $userName the username for the cluster
    */
    
    public function addCluster($clusterName, $clusterType, $hypervisor, $zoneId, $allocationState = "", $password = "", $podId = "", $url = "", $userName = "") {

        if (empty($clusterName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "clusterName"), MISSING_ARGUMENT);
        }

        if (empty($clusterType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "clusterType"), MISSING_ARGUMENT);
        }

        if (empty($hypervisor)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "hypervisor"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("addCluster", array(
            'clustername' => $clusterName,
            'clustertype' => $clusterType,
            'hypervisor' => $hypervisor,
            'zoneid' => $zoneId,
            'allocationstate' => $allocationState,
            'password' => $password,
            'podid' => $podId,
            'url' => $url,
            'username' => $userName,
        ));
    }
    
    /**
    * Deletes a cluster.
    *
    * @param string $id the cluster ID
    */
    
    public function deleteCluster($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteCluster", array(
            'id' => $id,
        ));
    }
    
    /**
    * Updates an existing cluster
    *
    * @param string $id the ID of the Cluster
    * @param string $allocationState Allocation state of this cluster for allocation o
    *        f new resources
    * @param string $clusterName the cluster name
    * @param string $clusterType hypervisor type of the cluster
    * @param string $hypervisor hypervisor type of the cluster
    * @param string $managedState whether this cluster is managed by cloudstack
    */
    
    public function updateCluster($id, $allocationState = "", $clusterName = "", $clusterType = "", $hypervisor = "", $managedState = "") {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("updateCluster", array(
            'id' => $id,
            'allocationstate' => $allocationState,
            'clustername' => $clusterName,
            'clustertype' => $clusterType,
            'hypervisor' => $hypervisor,
            'managedstate' => $managedState,
        ));
    }
    
    /**
    * Lists clusters.
    *
    * @param string $allocationState lists clusters by allocation state
    * @param string $clusterType lists clusters by cluster type
    * @param string $hypervisor lists clusters by hypervisor type
    * @param string $id lists clusters by the cluster ID
    * @param string $keyword List by keyword
    * @param string $managedState whether this cluster is managed by cloudstack
    * @param string $name lists clusters by the cluster name
    * @param string $page 
    * @param string $pageSize 
    * @param string $podId lists clusters by Pod ID
    * @param string $showCapacities flag to display the capacity of the clusters
    * @param string $zoneId lists clusters by Zone ID
    * @param string $page Pagination
    */
    
    public function listClusters($allocationState = "", $clusterType = "", $hypervisor = "", $id = "", $keyword = "", $managedState = "", $name = "", $page = "", $pageSize = "", $podId = "", $showCapacities = "", $zoneId = "", $page = "") {

        return $this->request("listClusters", array(
            'allocationstate' => $allocationState,
            'clustertype' => $clusterType,
            'hypervisor' => $hypervisor,
            'id' => $id,
            'keyword' => $keyword,
            'managedstate' => $managedState,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'podid' => $podId,
            'showcapacities' => $showCapacities,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a l2tp/ipsec remote access vpn
    *
    * @param string $publicIpId public ip address id of the vpn server
    * @param string $account an optional account for the VPN. Must be used with domain
    *        Id.
    * @param string $domainId an optional domainId for the VPN. If the account paramet
    *        er is used, domainId must also be used.
    * @param string $ipRange the range of ip addresses to allocate to vpn clients. The
    *         first ip in the range will be taken by the vpn server
    * @param string $openFirewall if true, firewall rule for source/end pubic port is 
    *        automatically created; if false - firewall rule has to be created explicitely. H
    *        as value true by default
    */
    
    public function createRemoteAccessVpn($publicIpId, $account = "", $domainId = "", $ipRange = "", $openFirewall = "") {

        if (empty($publicIpId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "publicIpId"), MISSING_ARGUMENT);
        }

        return $this->request("createRemoteAccessVpn", array(
            'publicipid' => $publicIpId,
            'account' => $account,
            'domainid' => $domainId,
            'iprange' => $ipRange,
            'openfirewall' => $openFirewall,
        ));
    }
    
    /**
    * Destroys a l2tp/ipsec remote access vpn
    *
    * @param string $publicIpId public ip address id of the vpn server
    */
    
    public function deleteRemoteAccessVpn($publicIpId) {

        if (empty($publicIpId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "publicIpId"), MISSING_ARGUMENT);
        }

        return $this->request("deleteRemoteAccessVpn", array(
            'publicipid' => $publicIpId,
        ));
    }
    
    /**
    * Lists remote access vpns
    *
    * @param string $publicIpId public ip address id of the vpn server
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $page Pagination
    */
    
    public function listRemoteAccessVpns($publicIpId, $account = "", $domainId = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $projectId = "", $page = "") {

        if (empty($publicIpId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "publicIpId"), MISSING_ARGUMENT);
        }

        return $this->request("listRemoteAccessVpns", array(
            'publicipid' => $publicIpId,
            'account' => $account,
            'domainid' => $domainId,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'page' => $page,
        ));
    }
    
    /**
    * Creates a VLAN IP range.
    *
    * @param string $startIp the beginning IP address in the VLAN IP range
    * @param string $account account who will own the VLAN. If VLAN is Zone wide, this
    *         parameter should be ommited
    * @param string $domainId domain ID of the account owning a VLAN
    * @param string $endIp the ending IP address in the VLAN IP range
    * @param string $forVirtualNetwork true if VLAN is of Virtual type, false if Direc
    *        t
    * @param string $gateway the gateway of the VLAN IP range
    * @param string $netmask the netmask of the VLAN IP range
    * @param string $networkId the network id
    * @param string $physicalNetworkId the physical network id
    * @param string $podId optional parameter. Have to be specified for Direct Untagge
    *        d vlan only.
    * @param string $projectId project who will own the VLAN. If VLAN is Zone wide, th
    *        is parameter should be ommited
    * @param string $vlan the ID or VID of the VLAN. Default is an &quot;untagged&quot
    *        ; VLAN.
    * @param string $zoneId the Zone ID of the VLAN IP range
    */
    
    public function createVlanIpRange($startIp, $account = "", $domainId = "", $endIp = "", $forVirtualNetwork = "", $gateway = "", $netmask = "", $networkId = "", $physicalNetworkId = "", $podId = "", $projectId = "", $vlan = "", $zoneId = "") {

        if (empty($startIp)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "startIp"), MISSING_ARGUMENT);
        }

        return $this->request("createVlanIpRange", array(
            'startip' => $startIp,
            'account' => $account,
            'domainid' => $domainId,
            'endip' => $endIp,
            'forvirtualnetwork' => $forVirtualNetwork,
            'gateway' => $gateway,
            'netmask' => $netmask,
            'networkid' => $networkId,
            'physicalnetworkid' => $physicalNetworkId,
            'podid' => $podId,
            'projectid' => $projectId,
            'vlan' => $vlan,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Creates a VLAN IP range.
    *
    * @param string $id the id of the VLAN IP range
    */
    
    public function deleteVlanIpRange($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteVlanIpRange", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists all VLAN IP ranges.
    *
    * @param string $account the account with which the VLAN IP range is associated. M
    *        ust be used with the domainId parameter.
    * @param string $domainId the domain ID with which the VLAN IP range is associated
    *        .  If used with the account parameter, returns all VLAN IP ranges for that accou
    *        nt in the specified domain.
    * @param string $forVirtualNetwork true if VLAN is of Virtual type, false if Direc
    *        t
    * @param string $id the ID of the VLAN IP range
    * @param string $keyword List by keyword
    * @param string $networkId network id of the VLAN IP range
    * @param string $page 
    * @param string $pageSize 
    * @param string $physicalNetworkId physical network id of the VLAN IP range
    * @param string $podId the Pod ID of the VLAN IP range
    * @param string $projectId project who will own the VLAN
    * @param string $vlan the ID or VID of the VLAN. Default is an &quot;untagged&quot
    *        ; VLAN.
    * @param string $zoneId the Zone ID of the VLAN IP range
    * @param string $page Pagination
    */
    
    public function listVlanIpRanges($account = "", $domainId = "", $forVirtualNetwork = "", $id = "", $keyword = "", $networkId = "", $page = "", $pageSize = "", $physicalNetworkId = "", $podId = "", $projectId = "", $vlan = "", $zoneId = "", $page = "") {

        return $this->request("listVlanIpRanges", array(
            'account' => $account,
            'domainid' => $domainId,
            'forvirtualnetwork' => $forVirtualNetwork,
            'id' => $id,
            'keyword' => $keyword,
            'networkid' => $networkId,
            'page' => $page,
            'pagesize' => $pageSize,
            'physicalnetworkid' => $physicalNetworkId,
            'podid' => $podId,
            'projectid' => $projectId,
            'vlan' => $vlan,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Create a new keypair and returns the private key
    *
    * @param string $name Name of the keypair
    * @param string $account an optional account for the ssh key. Must be used with do
    *        mainId.
    * @param string $domainId an optional domainId for the ssh key. If the account par
    *        ameter is used, domainId must also be used.
    * @param string $projectId an optional project for the ssh key
    */
    
    public function createSSHKeyPair($name, $account = "", $domainId = "", $projectId = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("createSSHKeyPair", array(
            'name' => $name,
            'account' => $account,
            'domainid' => $domainId,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Deletes a keypair by name
    *
    * @param string $name Name of the keypair
    * @param string $account the account associated with the keypair. Must be used wit
    *        h the domainId parameter.
    * @param string $domainId the domain ID associated with the keypair
    * @param string $projectId the project associated with keypair
    */
    
    public function deleteSSHKeyPair($name, $account = "", $domainId = "", $projectId = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("deleteSSHKeyPair", array(
            'name' => $name,
            'account' => $account,
            'domainid' => $domainId,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * List registered keypairs
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $fingerprint A public key fingerprint to look for
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $name A key pair name to look for
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $page Pagination
    */
    
    public function listSSHKeyPairs($account = "", $domainId = "", $fingerprint = "", $isRecursive = "", $keyword = "", $listAll = "", $name = "", $page = "", $pageSize = "", $projectId = "", $page = "") {

        return $this->request("listSSHKeyPairs", array(
            'account' => $account,
            'domainid' => $domainId,
            'fingerprint' => $fingerprint,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'page' => $page,
        ));
    }
    
    /**
    * Updates resource limits for an account or domain.
    *
    * @param string $resourceType Type of resource to update. Values are 0, 1, 2, 3, a
    *        nd 4. 0 - Instance. Number of instances a user can create. 1 - IP. Number of pub
    *        lic IP addresses a user can own. 2 - Volume. Number of disk volumes a user can c
    *        reate.3 - Snapshot. Number of snapshots a user can create.4 - Template. Number o
    *        f templates that a user can register/create.
    * @param string $account Update resource for a specified account. Must be used wit
    *        h the domainId parameter.
    * @param string $domainId Update resource limits for all accounts in specified dom
    *        ain. If used with the account parameter, updates resource limits for a specified
    *         account in specified domain.
    * @param string $max Maximum resource limit.
    * @param string $projectId Update resource limits for project
    */
    
    public function updateResourceLimit($resourceType, $account = "", $domainId = "", $max = "", $projectId = "") {

        if (empty($resourceType)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "resourceType"), MISSING_ARGUMENT);
        }

        return $this->request("updateResourceLimit", array(
            'resourcetype' => $resourceType,
            'account' => $account,
            'domainid' => $domainId,
            'max' => $max,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Recalculate and update resource count for an account or domain.
    *
    * @param string $domainId If account parameter specified then updates resource cou
    *        nts for a specified account in this domain else update resource counts for all a
    *        ccounts &amp;amp; child domains in specified domain.
    * @param string $account Update resource count for a specified account. Must be us
    *        ed with the domainId parameter.
    * @param string $projectId Update resource limits for project
    * @param string $resourceType Type of resource to update. If specifies valid value
    *        s are 0, 1, 2, 3, and 4. If not specified will update all resource counts0 - Ins
    *        tance. Number of instances a user can create. 1 - IP. Number of public IP addres
    *        ses a user can own. 2 - Volume. Number of disk volumes a user can create.3 - Sna
    *        pshot. Number of snapshots a user can create.4 - Template. Number of templates t
    *        hat a user can register/create.
    */
    
    public function updateResourceCount($domainId, $account = "", $projectId = "", $resourceType = "") {

        if (empty($domainId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "domainId"), MISSING_ARGUMENT);
        }

        return $this->request("updateResourceCount", array(
            'domainid' => $domainId,
            'account' => $account,
            'projectid' => $projectId,
            'resourcetype' => $resourceType,
        ));
    }
    
    /**
    * Lists resource limits.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $id Lists resource limits by ID.
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $resourceType Type of resource to update. Values are 0, 1, 2, 3, a
    *        nd 4. 0 - Instance. Number of instances a user can create. 1 - IP. Number of pub
    *        lic IP addresses a user can own. 2 - Volume. Number of disk volumes a user can c
    *        reate.3 - Snapshot. Number of snapshots a user can create.4 - Template. Number o
    *        f templates that a user can register/create.
    * @param string $page Pagination
    */
    
    public function listResourceLimits($account = "", $domainId = "", $id = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $projectId = "", $resourceType = "", $page = "") {

        return $this->request("listResourceLimits", array(
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'resourcetype' => $resourceType,
            'page' => $page,
        ));
    }
    
    /**
    * List hypervisors
    *
    * @param string $zoneId the zone id for listing hypervisors.
    * @param string $page Pagination
    */
    
    public function listHypervisors($zoneId = "", $page = "") {

        return $this->request("listHypervisors", array(
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Updates a hypervisor capabilities.
    *
    * @param string $id ID of the hypervisor capability
    * @param string $maxGuestsLimit the max number of Guest VMs per host for this hype
    *        rvisor.
    * @param string $securityGroupEnabled set true to enable security group for this h
    *        ypervisor.
    */
    
    public function updateHypervisorCapabilities($id = "", $maxGuestsLimit = "", $securityGroupEnabled = "") {

        return $this->request("updateHypervisorCapabilities", array(
            'id' => $id,
            'maxguestslimit' => $maxGuestsLimit,
            'securitygroupenabled' => $securityGroupEnabled,
        ));
    }
    
    /**
    * Lists all hypervisor capabilities.
    *
    * @param string $hypervisor the hypervisor for which to restrict the search
    * @param string $id ID of the hypervisor capability
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listHypervisorCapabilities($hypervisor = "", $id = "", $keyword = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listHypervisorCapabilities", array(
            'hypervisor' => $hypervisor,
            'id' => $id,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Adds F5 external load balancer appliance.
    *
    * @param string $password Password of the external load balancer appliance.
    * @param string $url URL of the external load balancer appliance.
    * @param string $userName Username of the external load balancer appliance.
    * @param string $zoneId Zone in which to add the external load balancer appliance.
    *        
    */
    
    public function addExternalLoadBalancer($password, $url, $userName, $zoneId) {

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("addExternalLoadBalancer", array(
            'password' => $password,
            'url' => $url,
            'username' => $userName,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Deletes a F5 external load balancer appliance added in a zone.
    *
    * @param string $id Id of the external loadbalancer appliance.
    */
    
    public function deleteExternalLoadBalancer($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteExternalLoadBalancer", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists F5 external load balancer appliances added in a zone.
    *
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $zoneId zone Id
    * @param string $page Pagination
    */
    
    public function listExternalLoadBalancers($keyword = "", $page = "", $pageSize = "", $zoneId = "", $page = "") {

        return $this->request("listExternalLoadBalancers", array(
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Adds an external firewall appliance
    *
    * @param string $password Password of the external firewall appliance.
    * @param string $url URL of the external firewall appliance.
    * @param string $userName Username of the external firewall appliance.
    * @param string $zoneId Zone in which to add the external firewall appliance.
    */
    
    public function addExternalFirewall($password, $url, $userName, $zoneId) {

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("addExternalFirewall", array(
            'password' => $password,
            'url' => $url,
            'username' => $userName,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Deletes an external firewall appliance.
    *
    * @param string $id Id of the external firewall appliance.
    */
    
    public function deleteExternalFirewall($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("deleteExternalFirewall", array(
            'id' => $id,
        ));
    }
    
    /**
    * List external firewall appliances.
    *
    * @param string $zoneId zone Id
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listExternalFirewalls($zoneId, $keyword = "", $page = "", $pageSize = "", $page = "") {

        if (empty($zoneId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "zoneId"), MISSING_ARGUMENT);
        }

        return $this->request("listExternalFirewalls", array(
            'zoneid' => $zoneId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Updates a configuration.
    *
    * @param string $name the name of the configuration
    * @param string $value the value of the configuration
    */
    
    public function updateConfiguration($name, $value = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        return $this->request("updateConfiguration", array(
            'name' => $name,
            'value' => $value,
        ));
    }
    
    /**
    * Lists all configurations.
    *
    * @param string $category lists configurations by category
    * @param string $keyword List by keyword
    * @param string $name lists configuration by name
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listConfigurations($category = "", $keyword = "", $name = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listConfigurations", array(
            'category' => $category,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Lists capabilities
    *
    * @param string $page Pagination
    */
    
    public function listCapabilities($page = "") {

        return $this->request("listCapabilities", array(
            'page' => $page,
        ));
    }
    
    /**
    * Acquires and associates a public IP to an account.
    *
    * @param string $account the account to associate with this IP address
    * @param string $domainId the ID of the domain to associate with this IP address
    * @param string $networkId The network this ip address should be associated to.
    * @param string $projectId Deploy vm for the project
    * @param string $zoneId the ID of the availability zone you want to acquire an pub
    *        lic IP address from
    */
    
    public function associateIpAddress($account = "", $domainId = "", $networkId = "", $projectId = "", $zoneId = "") {

        return $this->request("associateIpAddress", array(
            'account' => $account,
            'domainid' => $domainId,
            'networkid' => $networkId,
            'projectid' => $projectId,
            'zoneid' => $zoneId,
        ));
    }
    
    /**
    * Disassociates an ip address from the account.
    *
    * @param string $id the id of the public ip address to disassociate
    */
    
    public function disassociateIpAddress($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("disassociateIpAddress", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists all public ip addresses
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $allocatedOnly limits search results to allocated public IP addres
    *        ses
    * @param string $associatedNetworkId lists all public IP addresses associated to t
    *        he network specified
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $forLoadBalancing list only ips used for load balancing
    * @param string $forVirtualNetwork the virtual network for the IP address
    * @param string $id lists ip address by id
    * @param string $ipAddress lists the specified IP address
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $isSourceNat list only source nat ip addresses
    * @param string $isStaticNat list only static nat ip addresses
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $physicalNetworkId lists all public IP addresses by physical netwo
    *        rk id
    * @param string $projectId list firewall rules by project
    * @param string $vlanId lists all public IP addresses by VLAN ID
    * @param string $zoneId lists all public IP addresses by Zone ID
    * @param string $page Pagination
    */
    
    public function listPublicIpAddresses($account = "", $allocatedOnly = "", $associatedNetworkId = "", $domainId = "", $forLoadBalancing = "", $forVirtualNetwork = "", $id = "", $ipAddress = "", $isRecursive = "", $isSourceNat = "", $isStaticNat = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $physicalNetworkId = "", $projectId = "", $vlanId = "", $zoneId = "", $page = "") {

        return $this->request("listPublicIpAddresses", array(
            'account' => $account,
            'allocatedonly' => $allocatedOnly,
            'associatednetworkid' => $associatedNetworkId,
            'domainid' => $domainId,
            'forloadbalancing' => $forLoadBalancing,
            'forvirtualnetwork' => $forVirtualNetwork,
            'id' => $id,
            'ipaddress' => $ipAddress,
            'isrecursive' => $isRecursive,
            'issourcenat' => $isSourceNat,
            'isstaticnat' => $isStaticNat,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'physicalnetworkid' => $physicalNetworkId,
            'projectid' => $projectId,
            'vlanid' => $vlanId,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Adds Swift.
    *
    * @param string $url the URL for swift
    * @param string $account the account for swift
    * @param string $key key for the user for swift
    * @param string $userName the username for swift
    */
    
    public function addSwift($url, $account = "", $key = "", $userName = "") {

        if (empty($url)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "url"), MISSING_ARGUMENT);
        }

        return $this->request("addSwift", array(
            'url' => $url,
            'account' => $account,
            'key' => $key,
            'username' => $userName,
        ));
    }
    
    /**
    * List Swift.
    *
    * @param string $id the id of the swift
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listSwifts($id = "", $keyword = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listSwifts", array(
            'id' => $id,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Puts storage pool into maintenance state
    *
    * @param string $id Primary storage ID
    */
    
    public function enableStorageMaintenance($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("enableStorageMaintenance", array(
            'id' => $id,
        ));
    }
    
    /**
    * Cancels maintenance for primary storage
    *
    * @param string $id the primary storage ID
    */
    
    public function cancelStorageMaintenance($id) {

        if (empty($id)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "id"), MISSING_ARGUMENT);
        }

        return $this->request("cancelStorageMaintenance", array(
            'id' => $id,
        ));
    }
    
    /**
    * Lists all supported OS types for this cloud.
    *
    * @param string $id list by Os type Id
    * @param string $keyword List by keyword
    * @param string $osCategoryId list by Os Category id
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listOsTypes($id = "", $keyword = "", $osCategoryId = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listOsTypes", array(
            'id' => $id,
            'keyword' => $keyword,
            'oscategoryid' => $osCategoryId,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * Lists all supported OS categories for this cloud.
    *
    * @param string $id list Os category by id
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $page Pagination
    */
    
    public function listOsCategories($id = "", $keyword = "", $page = "", $pageSize = "", $page = "") {

        return $this->request("listOsCategories", array(
            'id' => $id,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'page' => $page,
        ));
    }
    
    /**
    * A command to list events.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $duration the duration of the event
    * @param string $endDate the end date range of the list you want to retrieve (use 
    *        format &quot;yyyy-MM-dd&quot; or the new format &quot;yyyy-MM-dd HH:mm:ss&quot;)
    *        
    * @param string $entryTime the time the event was entered
    * @param string $id the ID of the event
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $level the event level (INFO, WARN, ERROR)
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $projectId list firewall rules by project
    * @param string $startDate the start date range of the list you want to retrieve (
    *        use format &quot;yyyy-MM-dd&quot; or the new format &quot;yyyy-MM-dd HH:mm:ss&qu
    *        ot;)
    * @param string $type the event type (see event types)
    * @param string $page Pagination
    */
    
    public function listEvents($account = "", $domainId = "", $duration = "", $endDate = "", $entryTime = "", $id = "", $isRecursive = "", $keyword = "", $level = "", $listAll = "", $page = "", $pageSize = "", $projectId = "", $startDate = "", $type = "", $page = "") {

        return $this->request("listEvents", array(
            'account' => $account,
            'domainid' => $domainId,
            'duration' => $duration,
            'enddate' => $endDate,
            'entrytime' => $entryTime,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'level' => $level,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'projectid' => $projectId,
            'startdate' => $startDate,
            'type' => $type,
            'page' => $page,
        ));
    }
    
    /**
    * List Event Types
    *
    * @param string $page Pagination
    */
    
    public function listEventTypes($page = "") {

        return $this->request("listEventTypes", array(
            'page' => $page,
        ));
    }
    
    /**
    * Retrieves the current status of asynchronous job.
    *
    * @param string $jobId the ID of the asychronous job
    */
    
    public function queryAsyncJobResult($jobId) {

        if (empty($jobId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "jobId"), MISSING_ARGUMENT);
        }

        return $this->request("queryAsyncJobResult", array(
            'jobid' => $jobId,
        ));
    }
    
    /**
    * Lists all pending asynchronous jobs for the account.
    *
    * @param string $account List resources by account. Must be used with the domainId
    *         parameter.
    * @param string $domainId list only resources belonging to the domain specified
    * @param string $isRecursive defaults to false, but if true, lists all resources f
    *        rom the parent specified by the domainId till leaves.
    * @param string $keyword List by keyword
    * @param string $listAll If set to false, list only resources belonging to the com
    *        mand&#039;s caller; if set to true - list resources that the caller is authorize
    *        d to see. Default value is false
    * @param string $page 
    * @param string $pageSize 
    * @param string $startDate the start date of the async job
    * @param string $page Pagination
    */
    
    public function listAsyncJobs($account = "", $domainId = "", $isRecursive = "", $keyword = "", $listAll = "", $page = "", $pageSize = "", $startDate = "", $page = "") {

        return $this->request("listAsyncJobs", array(
            'account' => $account,
            'domainid' => $domainId,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'listall' => $listAll,
            'page' => $page,
            'pagesize' => $pageSize,
            'startdate' => $startDate,
            'page' => $page,
        ));
    }
    
    /**
    * Lists all the system wide capacities.
    *
    * @param string $clusterId lists capacity by the Cluster ID
    * @param string $fetchLatest recalculate capacities and fetch the latest
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $podId lists capacity by the Pod ID
    * @param string $sortBy Sort the results. Available values: Usage
    * @param string $type lists capacity by type* CAPACITY_TYPE_MEMORY = 0* CAPACITY_T
    *        YPE_CPU = 1* CAPACITY_TYPE_STORAGE = 2* CAPACITY_TYPE_STORAGE_ALLOCATED = 3* CAP
    *        ACITY_TYPE_VIRTUAL_NETWORK_PUBLIC_IP = 4* CAPACITY_TYPE_PRIVATE_IP = 5* CAPACITY
    *        _TYPE_SECONDARY_STORAGE = 6* CAPACITY_TYPE_VLAN = 7* CAPACITY_TYPE_DIRECT_ATTACH
    *        ED_PUBLIC_IP = 8* CAPACITY_TYPE_LOCAL_STORAGE = 9.
    * @param string $zoneId lists capacity by the Zone ID
    * @param string $page Pagination
    */
    
    public function listCapacity($clusterId = "", $fetchLatest = "", $keyword = "", $page = "", $pageSize = "", $podId = "", $sortBy = "", $type = "", $zoneId = "", $page = "") {

        return $this->request("listCapacity", array(
            'clusterid' => $clusterId,
            'fetchlatest' => $fetchLatest,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'podid' => $podId,
            'sortby' => $sortBy,
            'type' => $type,
            'zoneid' => $zoneId,
            'page' => $page,
        ));
    }
    
    /**
    * Register a public key in a keypair under a certain name
    *
    * @param string $name Name of the keypair
    * @param string $publicKey Public key material of the keypair
    * @param string $account an optional account for the ssh key. Must be used with do
    *        mainId.
    * @param string $domainId an optional domainId for the ssh key. If the account par
    *        ameter is used, domainId must also be used.
    * @param string $projectId an optional project for the ssh key
    */
    
    public function registerSSHKeyPair($name, $publicKey, $account = "", $domainId = "", $projectId = "") {

        if (empty($name)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "name"), MISSING_ARGUMENT);
        }

        if (empty($publicKey)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "publicKey"), MISSING_ARGUMENT);
        }

        return $this->request("registerSSHKeyPair", array(
            'name' => $name,
            'publickey' => $publicKey,
            'account' => $account,
            'domainid' => $domainId,
            'projectid' => $projectId,
        ));
    }
    
    /**
    * Logs out the user
    *
    */
    
    public function logout() {

        return $this->request("logout", array(
        ));
    }
    
    /**
    * Logs a user into the CloudStack. A successful login attempt will generate a JSESSIONID cookie value that can be passed in subsequent Query command calls until the "logout" command has been issued or the session has expired.
    *
    * @param string $userName Username
    * @param string $password Hashed password (Default is MD5). If you wish to use any
    *         other hashing algorithm, you would need to write a custom authentication adapte
    *        r See Docs section.
    * @param string $domain path of the domain that the user belongs to. Example: doma
    *        in=/com/cloud/internal.  If no domain is passed in, the ROOT domain is assumed.
    * @param string $domainId id of the domain that the user belongs to. If both domai
    *        n and domainId are passed in, &quot;domainId&quot; parameter takes precendence
    */
    
    public function login($userName, $password, $domain = "", $domainId = "") {

        if (empty($userName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userName"), MISSING_ARGUMENT);
        }

        if (empty($password)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "password"), MISSING_ARGUMENT);
        }

        return $this->request("login", array(
            'username' => $userName,
            'password' => $password,
            'domain' => $domain,
            'domainId' => $domainId,
        ));
    }
    
    /**
    * Configure the LDAP context for this site.
    *
    * @param string $hostName Hostname or ip address of the ldap server eg: my.ldap.co
    *        m
    * @param string $queryFilter You specify a query filter here, which narrows down t
    *        he users, who can be part of this domain.
    * @param string $searchBase The search base defines the starting point for the sea
    *        rch in the directory tree Example:  dc=cloud,dc=com.
    * @param string $bindDn Specify the distinguished name of a user with the search p
    *        ermission on the directory.
    * @param string $bindPass Enter the password.
    * @param string $port Specify the LDAP port if required, default is 389.
    * @param string $ssl Check Use SSL if the external LDAP server is configured for L
    *        DAP over SSL.
    * @param string $trustStore Enter the path to trust certificates store.
    * @param string $trustStorePass Enter the password for trust store.
    */
    
    public function ldapConfig($hostName, $queryFilter, $searchBase, $bindDn = "", $bindPass = "", $port = "", $ssl = "", $trustStore = "", $trustStorePass = "") {

        if (empty($hostName)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "hostName"), MISSING_ARGUMENT);
        }

        if (empty($queryFilter)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "queryFilter"), MISSING_ARGUMENT);
        }

        if (empty($searchBase)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "searchBase"), MISSING_ARGUMENT);
        }

        return $this->request("ldapConfig", array(
            'hostname' => $hostName,
            'queryfilter' => $queryFilter,
            'searchbase' => $searchBase,
            'binddn' => $bindDn,
            'bindpass' => $bindPass,
            'port' => $port,
            'ssl' => $ssl,
            'truststore' => $trustStore,
            'truststorepass' => $trustStorePass,
        ));
    }
    
    /**
    * Retrieves a cloud identifier.
    *
    * @param string $userId the user ID for the cloud identifier
    */
    
    public function getCloudIdentifier($userId) {

        if (empty($userId)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "userId"), MISSING_ARGUMENT);
        }

        return $this->request("getCloudIdentifier", array(
            'userid' => $userId,
        ));
    }
    
    /**
    * Uploads custom certificate
    *
    * @param string $certificate the custom cert to be uploaded
    * @param string $domainSuffix DNS domain suffix that the certificate is granted fo
    *        r
    * @param string $id the custom cert id in the chain
    * @param string $name the alias of the certificate
    * @param string $privateKey the private key for the certificate
    */
    
    public function uploadCustomCertificate($certificate, $domainSuffix, $id = "", $name = "", $privateKey = "") {

        if (empty($certificate)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "certificate"), MISSING_ARGUMENT);
        }

        if (empty($domainSuffix)) {
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, "domainSuffix"), MISSING_ARGUMENT);
        }

        return $this->request("uploadCustomCertificate", array(
            'certificate' => $certificate,
            'domainsuffix' => $domainSuffix,
            'id' => $id,
            'name' => $name,
            'privatekey' => $privateKey,
        ));
    }
    
    /**
    * Lists all alerts.
    *
    * @param string $id the ID of the alert
    * @param string $keyword List by keyword
    * @param string $page 
    * @param string $pageSize 
    * @param string $type list by alert type
    * @param string $page Pagination
    */
    
    public function listAlerts($id = "", $keyword = "", $page = "", $pageSize = "", $type = "", $page = "") {

        return $this->request("listAlerts", array(
            'id' => $id,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pageSize,
            'type' => $type,
            'page' => $page,
        ));
    }
    
}