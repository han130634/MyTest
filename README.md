# MyTest 学习slimphp框架  学习备注，经实操验证可用，可作为slim入门参照；

SlimPhp使用路由管理页面的访问，Slim本身并没有MVC模式，但是我们可以通过Controller来实现MVC的效果，因为我们的目标是编写接口，所以现在我们不考虑View层,只解决MC。
推荐查看akrabat的简单Slim项目理解Slim的运行逻辑Glihub地址:Slim-Bookshelf，slim-bookshelf-api，slim-bookshelf-web

本内容文件结构

项目的文件目录推荐如下：

app/----项目主要目录  
├── src----自定义编码目录  
│   ├── Bookshelf----book 目录  
│   │   ├── Author.php----测试用的model（由于db操作依赖的文件过多省略了，到controller层直接返回内容）  
│   │   └── AuthorController.php----测试用的controller  
│   ├── dependencies.php----添加需要使用的controller文件  
│   ├── middleware.php----添加需要使用的middleware文件  
│   └── routes.php----定义路由，可以单接口配置或者对接口分组配置，也可以接口单独添加中间件  
├── middleware----自定义中间件目录  
│   └── MyMiddleware.php----自定义中间件  
├── utils----自定义工具类目录  
│   └── CustomHandler.php----自定义工具类    
└── settings.php----设置的配置文件  
cache/----缓存目录  
data/----数据目录  
public/----用户可以访问的目录  
└── index.php----index处理页面  
vendor/----使用composer自动生成的目录【框架核心代码实现】  
composer.json----composer配置文件  
composer.lock----composer锁文件不需要管  
README.md----介绍文本文件


创建目录

按照上面的目录结构创建文件的目录app、cache、data、public，vendor目录使用composer命令自动生成，所以不需要我们创建。
实操可参照下面book api demo 系列文章。

slim框架学习参考资料：  
Slim  
https://blog.csdn.net/lihe460186709/article/details/59113595  
Book demo  
https://github.com/akrabat/slim-bookshelf  

Book api demo  
https://github.com/akrabat/slim-bookshelf-api  
https://www.bearever.cn/slim/slimphp框架的使用（二）编写接口/  
https://juejin.im/post/59bf7a45f265da0655053140  
https://www.bearever.cn/slim/slimphp框架的使用（二）编写接口/  
https://www.bearever.cn/slim/slimphp框架的使用（三）获取post数据/  

Slim document  
https://akrabat.com/wp-content/uploads/2017-05-27-PHPSrbija-SlimAPIs.pdf  

php framework rank  
https://www.hongkiat.com/blog/best-php-frameworks/  

Slim controller not found error .  
https://stackoverflow.com/questions/44128219/how-to-use-controller-and-model-in-slim-php-framework-with-example  

