# Buto-Plugin-PhpCookie

Handle cookies.

## Include
Include and create an object.
```
wfPlugin::includeonce('php/cookie');
$cookie = new PluginPhpCookie();
```

## Usage

### set
```
$cookie->set('_name_of_cookie_', '_a_value_');
```

### get
```
$cookie->get('_name_of_cookie_');
```

### del
```
$cookie->del('_name_of_cookie_');
```

## Params
Default values.
```
$cookie->$days = 30;
$cookie->$path = "/";
$cookie->$domain = "";
$cookie->$secure = true;
$cookie->$httponly = false;
```
