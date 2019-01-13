# Welcome to Joomla! Extension For YOYOW Blockchain
# 欢迎来到用于YOYOW区块链的Joomla!扩展
Before installing the Joomla! Extension For YOYOW Blockchain you will need to register an account and register your account as platform account and install the middleware on your server first.

安装用于YOYOW区块链的Joomla!扩展之前，您需要注册一个帐户且将您的帐户注册为平台帐户，并先在您的服务器上安装中间件。

## Platform configuration
## 平台配置
Follow the instruction below to register an account on YOYOW Blockchain

按照以下说明在YOYOW区块链上注册一个帐户

https://wiki.yoyow.org/en/latest/others/create_platform.html#creating-accounts-getting-private-keys

And then register your account as platform account

然后将您的帐户注册为平台帐户

https://wiki.yoyow.org/en/latest/others/create_platform.html#creating-platforms

## Middleware installation
## 中间件安装
YOYOW middleware communicates with YOYOW network through the API interface of YOYOW node. To use the Joomla! Extension For YOYOW Blockchain, you will need to deploy the middleware first.

YOYOW中间件通过YOYOW节点的API接口与YOYOW网络通讯。使用用于YOYOW区块链的Joomla!扩展，您需要先部署中间件。

### Configuration File Description
### 配置文件说明
The path to the configuration file is in the `conf/config.js` file in the code path. If you start it in docker mode, you can map the configuration file to the `/app/conf` directory in the container.

配置文件的路径在代码路径下的`conf/config.js`文件中，如果使用docker的方式启动，可以将配置文件映射到容器中`/app/conf`路径下。

```javascript
{
    // The api server address, the testnet public api address is as follows, for the official network deployment, please change the address
    apiServer: "ws://47.52.155.181:10011",
    
    // api服务器地址，测试网公共api地址如下，正式网部署请更改该地址
    apiServer: "ws://47.52.155.181:10011",
    
    // The validity time of the security request, and the unit is "s". If the requested content exceeds the validity period, it will return 1003 the request has expired.
    secure_ageing: 60,
    
    // 安全请求有效时间，单位s，如果请求的内容超过有效期，会返回1003 请求已过期
    secure_ageing: 60,
    
    // The platform security request verification key can be customized. For details, see "Security Access".
    secure_key: "",
    
    // 平台安全请求验证key可以自行定义，具体使用见《安全访问》
    secure_key: "",
    
    // Platform owner active key 
    active_key: "",
    
    // 平台所有者资金私钥 
    active_key: "",
    
    // Platform owner secondary key
    secondary_key: "", 
    
    // 平台所有者零钱私钥
    secondary_key: "",
    
    // Platform owner memo key
    memo_key: "",
    
    // 平台所有者备注私钥
    memo_key: "",
    
    // Platform id (yoyow id)
    platform_id: "",
    
    // 平台id (yoyow id)
    platform_id: "",
    
    // Whether to use points for the operating fee
    use_csaf: true,
    
    // 操作手续费是否使用积分
    use_csaf: true,
    
    // Whether the transfer is transferred to the balance, otherwise it is transferred to tipping
    to_balance: false,
    
    // 转账是否转到余额，否则转到零钱
    to_balance: false,
    
    // Wallet authorization page URL, testnet address is as follows, official network address “https://wallet.yoyow.org/#/authorize-service”
    wallet_url: "http://demo.yoyow.org:8000/#/authorize-service",
    
    // 钱包授权页URL，测试网地址如下，正式网地址 “https://wallet.yoyow.org/#/authorize-service”
    wallet_url: "http://demo.yoyow.org:8000/#/authorize-service",
    
    // The IP list that is allowed to access； forcing the specific IP address to be specified. "*" or "0.0.0.0" is not supported at this time.
    allow_ip: ["localhost", "127.0.0.1"]
    
    // 允许接入的IP列表，强制指定明确的来访IP地址，暂不支持"*"或"0.0.0.0"
    allow_ip: ["localhost", "127.0.0.1"]
}
```

Note: 注意：

1. In the general use scenario, the middleware value needs to use the secondary key and the memo key at most, and just the secondary key and the memo key can satisfy most of the requirements. Do not write the active key into the configuration file unless you are sure you need to use the active key.
1. 在一般使用场景中，中间件值最多需要动用零钱私钥和备注私钥，只配置零钱私钥和备注私钥可以满足大部分需求。除非你确定需要使用资金私钥，否则不要将资金私钥写进配置文件。

2. The middleware uses the restriction IP (`allow_ip`) and encryption request (`secure_key`) to ensure security. However, it is still strongly recommended that the intranet be deployed and isolated, and the security of the private key is quite important.

2. 中间件中使用了限制IP(`allow_ip`)和加密请求(`secure_key`)两种方式来保证安全性，不过依然强烈建议内网部署，做好隔离，私钥的安全性较为重要。

3. It is recommended to use the point deduction for the operation fee. If the deduction fails, it will directly report the error and will not automatically deduct the tipping as the fee.

3. 操作手续费建议使用积分抵扣，如果抵扣失败，会直接报错，不会自动扣除零钱作为手续费。

### Middleware Docker One-Click Deployment:
### 中间件Docker一键部署:

```bash
docker run -itd --name yoyow-middleware -v <Local configuration file path>:/app/conf -p 3001:3001 yoyoworg/yoyow-middleware
```

visit this webpage for more info about how to config the middleware and for the faq of the deployment of middleware: https://wiki.yoyow.org/en/latest/sdk/intro.html

访问此网页以获取有关如何配置中间件以及中间件部署常见问题的更多信息：https://wiki.yoyow.org/en/latest/sdk/intro.html

## Component installation/configuration
## 组件安装/配置
### Installation
### 安装
1. Login as administrator (Admin panel)
1. 以管理员身份登录（管理员面板）

2. Go to `Extensions` &rightarrow; `Manage` &rightarrow; `install`
2. 转到`Extensions` &rightarrow; `Manage` &rightarrow; `install`

3. In the `Upload Package File` tab. Drag or choose the zip component file.
3. 在`Upload Package File`选项卡中，拖动或选择zip组件文件。

### Configuration
### 配置
1. Login as administrator (Admin panel)
1. 以管理员身份登录（管理员面板）

2. Go to `Modules`
2. 转到`Modules`
3. Seach &rightarrow; `yoyow`
3. 搜索 &rightarrow; `yoyow`
4. Open module configuration and set the parameters:
4. 打开模块配置并设置参数：
- `Required YOYOW Sign Up` If all users who are registered in the Joomla! platform have to be synchronized with a yoyow account to navigate in, check it.
- `Required YOYOW Sign Up` 如果所有在Joomla!平台注册的用户必须与yoyow帐户同步才能操作，请进行检查。
- `MiddleWare Url` Your middleware location (I.E. localhost:3000 or http://172.18.0.1:3001)
- `MiddleWare Url` 你的中间件位置（即 localhost:3000 或 http://172.18.0.1:3001）
- `YOYOW Id` Your YOYOW Id (I.E. 27775948)
- `YOYOW Id` 你的YOYOW Id（即 27775948）
- `Url redirect` After users validate their account on yoyow platform, where they should be redirect? (I.E. http://myPage.es)
- `Url redirect` 用户在yoyow平台上验证他们的帐户后，他们应该跳转到哪里？ （即 http://myPage.es）

### Module position
### 模块位置
1. Login as administrator (Admin panel)
1. 以管理员身份登录（管理员面板）
2. Go to `Modules`
2. 转到`Modules`
3. Seach &rightarrow; `yoyow`
3. 搜索 &rightarrow; `yoyow`
4. Open module configuration and in the right sidebar we have all the position configuration like:
4.打开模块配置，右侧边栏中包含所有位置配置，如：
- `Position` let you put it in somewhere.
- `Position` 可用于配置位置。
- `Access` we recomend to put it as "registered" because unregistered users can't log in on yoyow's platform.
- `Access` 我们建议将其设置为“已注册”，因为未注册的用户无法登录yoyow的平台。

Otherwise if you just want to create a new yoyow's login menu, goto: 

如果您只是想创建一个新的yoyow登录菜单，请转到：
1. `Menus` &rightarrow; `Manage` &rightarrow; select the menu where yoyow login is going to be.
1. `Menus` &rightarrow; `Manage` &rightarrow; 选择yoyow登录所在的菜单。
2. `new`
3. The menu item type has to be `Yoyow` &rightarrow; `User Login - Yoyow`
3. 菜单项类型必须是`Yoyow` &rightarrow; `User Login - Yoyow`

## Joomla Extension Roadmap
## Joomla扩展路线图
YOYOW is a blockchain based content value network, its main goal is to establish a rational content income distribution mechanism to provide token incentives to content creators, website owners, content curators and consumers.

YOYOW是一个基于区块链的内容价值网络，其主要目标是建立合理的内容收入分配机制，为内容创作者、网站所有者、内容策展人和消费者提供token奖励。

This extension is developed based on the middleware of YOYOW blockchain to enable joomla websites to interact with YOYOW blockchain.

此扩展是基于YOYOW区块链的中间件开发的，以使Joomla网站能够与YOYOW区块链进行交互。

For more info, visit: https://yoyow.org/en.html
有关详细信息，请访问：https://yoyow.org/en.html

### This extension doesn’t provide token incentives at the moment, the token incentive feature is expected to go live on the 2nd quarter of 2019
### 此扩展目前不提供token奖励，token奖励功能预计将于2019年第二季度上线

## The extension has completed the following features:
## 该扩展程序已实现以下功能：
1. User login using identity from YOYOW blockchain
1. 用户使用YOYOW区块链中的身份登录

## The version 2.0 (1st  quarter of 2019) of the extension will complete the following features:
## 2.0版扩展（2019年第一季度）将实现以下功能：
1.	Post articles or hash values to the blockchain for blockchain content storage, witness and copyright protection
1. 将文章或哈希值发布到区块链，以便进行区块链内容存储，见证和版权保护
2.	QR Code login feature
2. 二维码登录功能
3.	Direct token transfer to send token reward to content creators
3. 直接token转账向内容创建者发送token奖励

## The version 3.0 (2nd quarter of 2019) of the extension will complete the following features:
## 3.0版扩展（2019年第2季度）将实现以下功能：
1. Token incentive feature
1. Token激励功能
