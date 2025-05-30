<?php

namespace App\Protocols;

use App\Utils\Helper;

class Surge
{
    public $flag = 'surge';
    private $servers;
    private $user;

    public function __construct($user, $servers)
    {
        $this->user = $user;
        $this->servers = $servers;
    }

    public function handle()
    {
        $servers = $this->servers;
        $user = $this->user;

        $appName = admin_setting('app_name', 'XBoard');

        $proxies = '';
        $proxyGroup = '';
	$HKProxies = '';
        $TWProxies = '';
        $SGProxies = '';
        $UKProxies = '';
        $USProxies = '';

        foreach ($servers as $item) {
            if ($item['type'] === 'shadowsocks'
                && in_array($item['cipher'], [
                    'aes-128-gcm',
                    'aes-192-gcm',
                    'aes-256-gcm',
                    'chacha20-ietf-poly1305',
                    '2022-blake3-aes-128-gcm',
                    '2022-blake3-aes-256-gcm',
                ])
            ) {
                // [Proxy]
                $proxies .= self::buildShadowsocks($item['password'], $item);
                // [Proxy Group]
                $proxyGroup .= $item['name'] . ', ';

                // Check for "HK" in name (case insensitive)
                if (stripos($item['name'], 'HK') !== false || stripos($item['name'], '香港') !== false) {
                    $HKProxies .= $item['name'] . ', ';
                }
                // Check for "TW" in name (case insensitive)
                elseif (stripos($item['name'], 'TW') !== false || stripos($item['name'], '台湾') !== false) {
                    $TWProxies .= $item['name'] . ', ';
                }
                // Check for "SG" in name (case insensitive)
                elseif (stripos($item['name'], 'SG') !== false || stripos($item['name'], '新加坡') !== false) {
                    $SGProxies .= $item['name'] . ', ';
                }
                // Check for "UK" in name (case insensitive)
                elseif (stripos($item['name'], 'UK') !== false || stripos($item['name'], '英国') !== false) {
                    $UKProxies .= $item['name'] . ', ';
                }
                // Check for "US" in name (case insensitive)
                elseif (stripos($item['name'], 'US') !== false || stripos($item['name'], '美国') !== false) {
                    $USProxies .= $item['name'] . ', ';
                }

		// You could customise any group if you want, but add a string after line 33, and apply str_replace function after line 180

            }
            if ($item['type'] === 'vmess') {
                // [Proxy]
                $proxies .= self::buildVmess($user['uuid'], $item);
                // [Proxy Group]
                $proxyGroup .= $item['name'] . ', ';

                // Check for "HK" in name (case insensitive)
                if (stripos($item['name'], 'HK') !== false || stripos($item['name'], '香港') !== false) {
                    $HKProxies .= $item['name'] . ', ';
                }
                // Check for "TW" in name (case insensitive)
                elseif (stripos($item['name'], 'TW') !== false || stripos($item['name'], '台湾') !== false) {
                    $TWProxies .= $item['name'] . ', ';
                }
                // Check for "SG" in name (case insensitive)
                elseif (stripos($item['name'], 'SG') !== false || stripos($item['name'], '新加坡') !== false) {
                    $SGProxies .= $item['name'] . ', ';
                }
                // Check for "UK" in name (case insensitive)
                elseif (stripos($item['name'], 'UK') !== false || stripos($item['name'], '英国') !== false) {
                    $UKProxies .= $item['name'] . ', ';
                }
                // Check for "US" in name (case insensitive)
                elseif (stripos($item['name'], 'US') !== false || stripos($item['name'], '美国') !== false) {
                    $USProxies .= $item['name'] . ', ';
                }

            }
            if ($item['type'] === 'trojan') {
                // [Proxy]
                $proxies .= self::buildTrojan($user['uuid'], $item);
                // [Proxy Group]
                $proxyGroup .= $item['name'] . ', ';

                // Check for "HK" in name (case insensitive)
                if (stripos($item['name'], 'HK') !== false || stripos($item['name'], '香港') !== false) {
                    $HKProxies .= $item['name'] . ', ';
                }
                // Check for "TW" in name (case insensitive)
                elseif (stripos($item['name'], 'TW') !== false || stripos($item['name'], '台湾') !== false) {
                    $TWProxies .= $item['name'] . ', ';
                }
                // Check for "SG" in name (case insensitive)
                elseif (stripos($item['name'], 'SG') !== false || stripos($item['name'], '新加坡') !== false) {
                    $SGProxies .= $item['name'] . ', ';
                }
                // Check for "UK" in name (case insensitive)
                elseif (stripos($item['name'], 'UK') !== false || stripos($item['name'], '英国') !== false) {
                    $UKProxies .= $item['name'] . ', ';
                }
                // Check for "US" in name (case insensitive)
                elseif (stripos($item['name'], 'US') !== false || stripos($item['name'], '美国') !== false) {
                    $USProxies .= $item['name'] . ', ';
                }

            }
            if ($item['type'] === 'hysteria') {
                // [Proxy]
                $proxies .= self::buildHysteria($user['uuid'], $item);
                // [Proxy Group]
                $proxyGroup .= $item['name'] . ', ';

                // Check for "HK" in name (case insensitive)
                if (stripos($item['name'], 'HK') !== false || stripos($item['name'], '香港') !== false) {
                    $HKProxies .= $item['name'] . ', ';
                }
                // Check for "TW" in name (case insensitive)
                elseif (stripos($item['name'], 'TW') !== false || stripos($item['name'], '台湾') !== false) {
                    $TWProxies .= $item['name'] . ', ';
                }
                // Check for "SG" in name (case insensitive)
                elseif (stripos($item['name'], 'SG') !== false || stripos($item['name'], '新加坡') !== false) {
                    $SGProxies .= $item['name'] . ', ';
                }
                // Check for "UK" in name (case insensitive)
                elseif (stripos($item['name'], 'UK') !== false || stripos($item['name'], '英国') !== false) {
                    $UKProxies .= $item['name'] . ', ';
                }
                // Check for "US" in name (case insensitive)
                elseif (stripos($item['name'], 'US') !== false || stripos($item['name'], '美国') !== false) {
                    $USProxies .= $item['name'] . ', ';
                }

            }
        }

        $defaultConfig = base_path() . '/resources/rules/default.surge.conf';
        $customConfig = base_path() . '/resources/rules/custom.surge.conf';
        if (\File::exists($customConfig)) {
            $config = file_get_contents("$customConfig");
        } else {
            $config = file_get_contents("$defaultConfig");
        }

        // Subscription link
        $subsDomain = request()->header('Host');
        $subsURL = Helper::getSubscribeUrl($user['token'], $subsDomain ? 'https://' . $subsDomain : null);

        $config = str_replace('$subs_link', $subsURL, $config);
        $config = str_replace('$subs_domain', $subsDomain, $config);
        $config = str_replace('$proxies', $proxies, $config);
        $config = str_replace('$proxy_group', rtrim($proxyGroup, ', '), $config);
	$config = str_replace('$HK_proxies', rtrim($HKProxies, ', '), $config);
        $config = str_replace('$TW_proxies', rtrim($TWProxies, ', '), $config);
        $config = str_replace('$SG_proxies', rtrim($SGProxies, ', '), $config);
        $config = str_replace('$UK_proxies', rtrim($UKProxies, ', '), $config);
        $config = str_replace('$US_proxies', rtrim($USProxies, ', '), $config);

        $upload = round($user['u'] / (1024*1024*1024), 2);
        $download = round($user['d'] / (1024*1024*1024), 2);
        $useTraffic = $upload + $download;
        $totalTraffic = round($user['transfer_enable'] / (1024*1024*1024), 2);
        $unusedTraffic = $totalTraffic - $useTraffic;
        $expireDate = $user['expired_at'] === NULL ? 'Never Expire' : date('Y-m-d H:i:s', $user['expired_at']);
        $subscribeInfo = "title=Proxy Subscription Details, content=Upload Traffic: {$upload}GB\\nDownload Traffic: {$download}GB\\nRemaining Data: {$unusedTraffic}GB\\nPackage traffic: {$totalTraffic}GB\\nExpire Date: {$expireDate}";
        $config = str_replace('$subscribe_info', $subscribeInfo, $config);

        return response($config, 200)
                    ->header('content-disposition', "attachment;filename*=UTF-8''".rawurlencode($appName).".conf");
    }


    public static function buildShadowsocks($password, $server)
    {
        $config = [
            "{$server['name']}=ss",
            "{$server['host']}",
            "{$server['port']}",
            "encrypt-method={$server['cipher']}",
            "password={$password}",
            'tfo=true',
            'udp-relay=true'
        ];
        $config = array_filter($config);
        $uri = implode(',', $config);
        $uri .= "\r\n";
        return $uri;
    }

    public static function buildVmess($uuid, $server)
    {
        $config = [
            "{$server['name']}=vmess",
            "{$server['host']}",
            "{$server['port']}",
            "username={$uuid}",
            "vmess-aead=true",
            'tfo=true',
            'udp-relay=true'
        ];

        if ($server['tls']) {
            array_push($config, 'tls=true');
            if ($server['tlsSettings']) {
                $tlsSettings = $server['tlsSettings'];
                if (isset($tlsSettings['allowInsecure']) && !empty($tlsSettings['allowInsecure']))
                    array_push($config, 'skip-cert-verify=' . ($tlsSettings['allowInsecure'] ? 'true' : 'false'));
                if (isset($tlsSettings['serverName']) && !empty($tlsSettings['serverName']))
                    array_push($config, "sni={$tlsSettings['serverName']}");
            }
        }
        if ($server['network'] === 'ws') {
            array_push($config, 'ws=true');
            if ($server['networkSettings']) {
                $wsSettings = $server['networkSettings'];
                if (isset($wsSettings['path']) && !empty($wsSettings['path']))
                    array_push($config, "ws-path={$wsSettings['path']}");
                if (isset($wsSettings['headers']['Host']) && !empty($wsSettings['headers']['Host']))
                    array_push($config, "ws-headers=Host:{$wsSettings['headers']['Host']}");
            }
        }

        $uri = implode(',', $config);
        $uri .= "\r\n";
        return $uri;
    }

    public static function buildTrojan($password, $server)
    {
        $config = [
            "{$server['name']}=trojan",
            "{$server['host']}",
            "{$server['port']}",
            "password={$password}",
            $server['server_name'] ? "sni={$server['server_name']}" : "",
            'tfo=true',
            'udp-relay=true'
        ];
        if (!empty($server['allow_insecure'])) {
            array_push($config, $server['allow_insecure'] ? 'skip-cert-verify=true' : 'skip-cert-verify=false');
        }
        $config = array_filter($config);
        $uri = implode(',', $config);
        $uri .= "\r\n";
        return $uri;
    }

    //参考文档: https://manual.nssurge.com/policy/proxy.html
    public static function buildHysteria($password, $server)
    {
        if($server['version'] != 2) return '';
        $config = [
            "{$server['name']}=hysteria2",
            "{$server['host']}",
            "{$server['port']}",
            "password={$password}",
            "download-bandwidth={$server['up_mbps']}",
            $server['server_name'] ? "sni={$server['server_name']}" : "",
            // 'tfo=true', 
            'udp-relay=true'
        ];
        if ($server['insecure']) {
            $config[] = $server['insecure'] ? 'skip-cert-verify=true' : 'skip-cert-verify=false';
        }    
        $config = array_filter($config);
        $uri = implode(',', $config);
        $uri .= "\r\n";
        return $uri;
    }
}
