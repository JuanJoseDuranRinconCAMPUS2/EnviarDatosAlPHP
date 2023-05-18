# **apache_request_headers**

**Contenidos**


[TOC]



## ***Definicion***

Obtiene todas las cabeceras de petición HTTP de la llamada actual. Funciona con Apache, FastCGI, CLI, y servidores Web FPM.

## ***Cabeceras* de la peticion**

- Host
- Connection
- Content-Length
- sec-ch-ua
- sec-ch-ua-platform
- sec-ch-ua-mobile
- User-Agent
- content-type
- Accept
- Origin
- Sec-Fetch-Site
- Sec-Fetch-Mode
- Sec-Fetch-Dest
- Referer
- Accept-Encoding
- Accept-Language
- Cookie

### ***Host***

El encabezado de solicitud **`Host`** especifica el nombre de dominio del servidor (para hosting virtual), y (opcionalmente) el número de puerto TCP en el que el servidor esta escuchando.

**Si no se provee un puerto, se usará el puerto por defecto para el servicio solicitado (e.j.: "80" para una URL HTTP).**

#### **Sintaxis**

```php
Host: <host>:<puerto>
```

#### **Ejemplo**

```php
echo($_HEADERS["Host"]); //resultado: Host: localhost 
```

### ***Connection***

El encabezado general **`Connection`** controla si la conexión de red permanece abierta después de que finaliza la transacción actual. Si el valor enviado es  **`keep-alive`**, la conexión es persistente y no cerrada, lo que permite realizar solicitudes posteriores al mismo servidor.

#### **Sintaxis**

```php
Connection: keep-alive
Connection: close
```

#### **Ejemplo**

```php
    echo($_HEADERS["Connection"]); //resultado: Connection: keep-alive 
```

### ***Content-Length***

El encabezado de entidad **`Content-Length`** indica el tamaño de la entidad-cuerpo, en bytes, enviado al destinatario.

#### **Sintaxis**

```php
Content-Length: <longitud>
```

#### **Ejemplo**

```php
    echo($_HEADERS["Content-Length"]); //resultado: Content-Length: 37 
```

### ***sec-ch-ua***

El Sec-CH-UA`**  <u>user agent client hint</u> proporciona la marca del agente de usuario y la información de versión significativa.

El encabezado **`Sec-CH-UA`** proporciona la marca y la versión significativa de cada marca asociada con el navegador en una lista separada por comas.

<u>Una marca es un nombre comercial para el agente de usuario como: Chromium, Opera, Google Chrome, Microsoft Edge, Firefox y Safari.</u> 

#### **Sintaxis**

```php
Sec-CH-UA: "<brand>";v="<significant version>", ...
```

#### **Ejemplo**

```php
    echo($_HEADERS["sec-ch-ua"]); //resultado: sec-ch-ua: "Chromium";v="112", "Not_A Brand";v="24", "Opera GX";v="98"
```

### ***sec-ch-ua-platform***

El  **`Sec-CH-UA-Platform`** <u>user agent client hint</u> proporciona la plataforma o el sistema operativo en el que se ejecuta el agente de usuario. Por ejemplo: 'Windows' o 'Android'.



<u>Este encabezado porporciona Una de las siguientes cadenas: 'Android', 'Chrome OS', 'Chromium OS', 'iOS', 'Linux', 'macOS', 'Windows' o 'Unknown'..</u> 

#### **Sintaxis**

```php
Sec-CH-UA-Platform: <platform>
```

#### **Ejemplo**

```php
    echo($_HEADERS["sec-ch-ua-platform"]); //resultado: sec-ch-ua-platform: "Windows" 
```

### ***sec-ch-ua-mobile***

El  **`Sec-CH-UA-Mobile`** <u>user  agent client hint</u> indica si el navegador está en un dispositivo móvil. También puede ser utilizado por un navegador de escritorio para indicar una preferencia por una experiencia de usuario 'móvil'.

<u>?1 indica que el agente de usuario prefiere una experiencia móvil (verdadero). ?0 indica que el agente de usuario no prefiere una experiencia móvil (falso).</u> 

#### **Sintaxis**

```php
Sec-CH-UA-Mobile: <boolean>
```

#### **Ejemplo**

```php
    echo($_HEADERS["sec-ch-ua-mobile"]); //resultado: sec-ch-ua-mobile: ?0 
```

### ***User-Agent***

El  **`User-Agent`** es una cadena característica que le permite a los servidores y servicios de red identificar la aplicación, sistema operativo, compañía, y/o la versión del [user agent (en-US] que hace la petición.

#### **Sintaxis**

```php
User-Agent: <producto> / <producto-version> <comentario>
Formato comun para navegadores web:
User-Agent: Mozilla/5.0 (<información-de-sistema>) <plataforma> (<platforma-detalles>) <extensiones>
```

#### **Ejemplo**

```php
    echo($_HEADERS["User-Agent"]); //resultado: User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 OPR/98.0.0.0 

```

### ***content-type***

El  **`User-Agent`** dice al cliente que tipo de contenido será retornado. Los navegadores rastrearán `MIME` en algunos casos y no seguirán necesariamente el valor de este encabezado; para evitar este comportamiento, el encabezado [`X-Content-Type-Options`](https://developer.mozilla.org/es/docs/Web/HTTP/Headers/X-Content-Type-Options) se puede establecer en `nosniff`.

#### **Sintaxis**

```php
Content-Type: text/html; charset=utf-8
Content-Type: multipart/form-data; boundary=something
```

#### **Ejemplo**

```php
    echo($_HEADERS["content-type"]); //resultado: content-type: application/json

```

### ***Accept***

`La cabecera de pedido Accept` anuncia que tipo de contenido el cliente puede procesar, expresado como un tipo [MIME](https://developer.mozilla.org/es/docs/Web/HTTP/Basics_of_HTTP/MIME_types). Usando [negociación de contenido (en-US)](https://developer.mozilla.org/en-US/docs/Web/HTTP/Content_negotiation), el servidor selecciona una de las propuestas , la utiliza e informa al cliente de la elección a través de la cabecera de respuesta [`Content-Type`](https://developer.mozilla.org/es/docs/Web/HTTP/Headers/Content-Type) .

#### ***Directivas***

```
<MIME_type>/<MIME_subtype>
```

Un único y preciso tipo [MIME](https://developer.mozilla.org/es/docs/Web/HTTP/Basics_of_HTTP/MIME_types), como `text/html`.

```
<MIME_type>/*
```

Un tipo MIME, pero con cualquier subtipo. Por ejmplo, image/* comincide con:

- image/png
- image/svg
- image/gif

```
*/*
```

Culaquier tipo MIME

`;q=` (donde *q* es la importancia o peso)

Culaquier valor es colocado en orden de preferencia, expresada usando un [valor de calidad (en-US)](https://developer.mozilla.org/en-US/docs/Glossary/Quality_values) llamado *weight* (*peso* en español).

#### **Sintaxis**

```php
Accept: <MIME_type>/<MIME_subtype>
Accept: <MIME_type>/*
Accept: */*
```

#### **Ejemplo**

```php
    echo($_HEADERS["Accept"]); //resultado: Accept: */* 

```

### ***Origin***

La cabecera de petición **`Origin`** indica de dónde se origina una búsqueda. No incluye ninguna información de ruta, sino sólo el nombre del servidor. 

#### **Sintaxis**

```php
Origin: ""
Origin: <esquema> "://" <nombre de host> [ ":" <puerto> ]
```

#### **Ejemplo**

```php
    echo($_HEADERS["Origin"]); //resultado: Origin: http://localhost 

```

### ***Sec-Fetch-Site***

La cabecera de petición **`Origin`** indica de dónde se origina una búsqueda. No incluye ninguna información de ruta, sino sólo el nombre del servidor. 

#### ***Directivas***

```
cross-site
```

El iniciador de la solicitud y el servidor que aloja el recurso tienen un sitio diferente (es decir, una solicitud de 'potencialmente-evil.com' para un recurso en 'example.com').

```
same-origin
```

El iniciador de la solicitud y el servidor que aloja el recurso tienen el mismo [origen](https://developer.mozilla.org/en-US/docs/Glossary/Origin) (mismo esquema, host y puerto).

```
same-site
```

El iniciador de la solicitud y el servidor que aloja el recurso tienen el mismo esquema, dominio y/o subdominio, pero no necesariamente el mismo puerto.

```
none
```

Esta solicitud es una operación originada por el usuario. Por ejemplo: ingresar una URL en la barra de direcciones, abrir un marcador o arrastrar y soltar un archivo en la ventana del navegador.

#### **Sintaxis**

```php
Sec-Fetch-Site: cross-site
Sec-Fetch-Site: same-origin
Sec-Fetch-Site: same-site
Sec-Fetch-Site: none
```

#### **Ejemplo**

```php
    echo($_HEADERS["Sec-Fetch-Site"]); //resultado: Sec-Fetch-Site: same-origin 

```

### ***Sec-Fetch-Mode***

The **`Sec-Fetch-Mode`** [fetch metadata request header](https://developer.mozilla.org/en-US/docs/Glossary/Fetch_metadata_request_header) indica el modo de la solicitud.

#### **Sintaxis**

```php
Sec-Fetch-Mode: cors
Sec-Fetch-Mode: navigate
Sec-Fetch-Mode: no-cors
Sec-Fetch-Mode: same-origin
Sec-Fetch-Mode: websocket
```

#### **Ejemplo**

```php
    echo($_HEADERS["Sec-Fetch-Mode"]); //resultado: Sec-Fetch-Mode: cors 

```

### ***Sec-Fetch-Dest***

 indica el destino de la solicitud. Ese es el iniciador de la solicitud de recuperación original, que es dónde (y cómo) se utilizarán los datos obtenidos.

#### **Sintaxis**

```php
Sec-Fetch-Dest: audio
Sec-Fetch-Dest: audioworklet
Sec-Fetch-Dest: document
Sec-Fetch-Dest: embed
Sec-Fetch-Dest: empty
Sec-Fetch-Dest: font
Sec-Fetch-Dest: frame
Sec-Fetch-Dest: iframe
Sec-Fetch-Dest: image
Sec-Fetch-Dest: manifest
Sec-Fetch-Dest: object
Sec-Fetch-Dest: paintworklet
Sec-Fetch-Dest: report
Sec-Fetch-Dest: script
Sec-Fetch-Dest: serviceworker
Sec-Fetch-Dest: sharedworker
Sec-Fetch-Dest: style
Sec-Fetch-Dest: track
Sec-Fetch-Dest: video
Sec-Fetch-Dest: worker
Sec-Fetch-Dest: xslt
```

#### **Ejemplo**

```php
    echo($_HEADERS["Sec-Fetch-Dest"]); //resultado: Sec-Fetch-Dest: empty 

```

### ***Referer***

La cabecera de solicitud **`Referer`** (‘referente’) contiene la dirección de la página web anterior de la que provenía el enlace a la página actual que se siguió. La cabecera `Referer` permite a los servidores identificar de dónde los visitan las personas y pueden emplear estos datos para realizar análisis, registros o un almacenamiento en antememoria optimizado, por mencionar algunos ejemplos.

#### **Sintaxis**

```php
Referer: <url>
```

#### **Ejemplo**

```php
    echo($_HEADERS["Referer"]); //resultado: Referer: http://localhost/proyectosPHP/EnviarDatosAlPHP/index.html

```

### 
