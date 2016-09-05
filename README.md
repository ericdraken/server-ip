# server-ip
Get the server IP used when making outbound connections. For example, on a shared host you point the DNS records to one IP address, but when you make a cURL request from your server you may find that the IP is not the same. 

Why is this useful? Sometimes you need to whitelist your server IP for some API connections (e.g. LINE Bot)

We perform the primary detection method via

`$ip = gethostbyname(gethostname());`

and if that fails, we can use

`passthru('curl -s http://'.$_SERVER['SERVER_NAME'].'/ip/ip.php');`

Also, if you are sitting behind a Cloudflare proxy, for the second method of IP detection, you will need to extract a custom header like so:

```
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}
```
