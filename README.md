# Welcome to Joomla! Extension For YOYOW Blockchain

Before installing the Joomla! Extension For YOYOW Blockchain you will need to register an account and register your account as platform account and install the middleware on your server first.

## Platform configuration
Follow the instruction below to register an account on YOYOW Blockchain

https://wiki.yoyow.org/en/latest/others/create_platform.html#creating-accounts-getting-private-keys

And then register your account as platform account

https://wiki.yoyow.org/en/latest/others/create_platform.html#creating-platforms

## Middleware installation
YOYOW middleware communicates with YOYOW network through the API interface of YOYOW node. to use the Joomla! Extension For YOYOW Blockchain, you will need to deploy the middleware first

### Configuration File Description

The path to the configuration file is in the `conf/config.js` file in the code path. If you start it in docker mode, you can map the configuration file to the `/app/conf` directory in the container.

```javascript
{
    // The api server address, the testnet public api address is as follows, for the official network deployment, please change the address
    apiServer: "ws://47.52.155.181:10011",
    
    // The validity time of the security request, and the unit is "s". If the requested content exceeds the validity period, it will return 1003 the request has expired.
    secure_ageing: 60,
    
    // The platform security request verification key can be customized. For details, see "Security Access".
    secure_key: "",
    
    // Platform owner active key 
    active_key: "",
    
    // Platform owner secondary key
    secondary_key: "", 
    
    // Platform owner memo key
    memo_key: "",
    
    // Platform id (yoyow id)
    platform_id: "",
    
    // Whether to use points for the operating fee
    use_csaf: true,
    
    // Whether the transfer is transferred to the balance, otherwise it is transferred to tipping
    to_balance: false,
    
    // Wallet authorization page URL, testnet address is as follows, official network address “https://wallet.yoyow.org/#/authorize-service”
    wallet_url: "http://demo.yoyow.org:8000/#/authorize-service",
    
    // The IP list that is allowed to access； forcing the specific IP address to be specified. "*" or "0.0.0.0" is not supported at this time.
    allow_ip: ["localhost", "127.0.0.1"]
}
```

Note:

1. In the general use scenario, the middleware value needs to use the secondary key and the memo key at most, and just the secondary key and the memo key can satisfy most of the requirements. Do not write the active key into the configuration file unless you are sure you need to use the active key.
2. The middleware uses the restriction IP (`allow_ip`) and encryption request (`secure_key`) to ensure security. However, it is still strongly recommended that the intranet be deployed and isolated, and the security of the private key is quite important.
3. It is recommended to use the point deduction for the operation fee. If the deduction fails, it will directly report the error and will not automatically deduct the tipping as the fee.

### Middleware Docker One-Click Deployment:
```bash
docker run -itd --name yoyow-middleware -v <Local configuration file path>:/app/conf -p 3001:3001 yoyoworg/yoyow-middleware
```

visit this webpage for more info about how to config the middleware and for the faq of the deployment of middleware: https://wiki.yoyow.org/en/latest/sdk/intro.html

## Component installation/configuration
### Installation
1. Login as administrator (Admin panel)
2. Go to `Extensions` &rightarrow; `Manage` &rightarrow; `install`
3. In the `Upload Package File` tab. Drag or choose the zip component file.


### Configuration
1. Login as administrator (Admin panel)
2. Go to `Modules`
3. Seach &rightarrow; `yoyow`
4. Open module configuration and set the parameters:
- `Required YOYOW Sign Up` If all users who are registered in the Joomla! platform have to be synchronized with a yoyow account to navigate in, check it.
- `MiddleWare Url` Your middleware location (I.E. localhost:3000 or http://172.18.0.1:3001)
- `YOYOW Id` Your YOYOW Id (I.E. 27775948)
- `Url redirect` After users validate their account on yoyow platform, where they should be redirect? (I.E. http://myPage.es)


### Module position
1. Login as administrator (Admin panel)
2. Go to `Modules`
3. Seach &rightarrow; `yoyow`
4. Open module configuration and in the right sidebar we have all the position configuration like:
- `Position` let you put it in somewhere.
- `Access` we recomend to put it as "registered" because unregistered users can't log in on yoyow's platform.

Otherwise if you just want to create a new yoyow's login menu, goto: 
1. `Menus` &rightarrow; `Manage` &rightarrow; select the menu where yoyow login is going to be.
2. `new`
3. The menu item type has to be `Yoyow` &rightarrow; `User Login - Yoyow`

## Joomla Extension Roadmap
YOYOW is a blockchain based content value network, its main goal is to establish a rational content income distribution mechanism to provide token incentives to content creators, website owners, content curators and consumers.
This extension is developed based on the middleware of YOYOW blockchain to enable joomla websites to interact with YOYOW blockchain.

For more info, visit: https://yoyow.org/en.html
### This extension doesn’t provide token incentives at the moment, the token incentive feature is expected to go live on the 2nd quarter of 2019

## The extension has completed the following features:
1.	User login using identity from YOYOW blockchain

## The version 2.0 (1st  quarter of 2019) of the extension will complete the following features:
1.	Post articles or hash values to the blockchain for blockchain content storage, witness and copyright protection
2.	QR Code login feature
3.	Direct token transfer to send token reward to content creators

## The version 3.0 (2nd quarter of 2019) of the extension will complete the following features:
1.	Token incentive feature
