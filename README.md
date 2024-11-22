# **Documentación del Proyecto - Blog Platform (Backend)**

## **Visión General**
Este proyecto es una plataforma de blogs que expone una API para la gestión y consulta de publicaciones. Los usuarios pueden crear, gestionar y categorizar publicaciones, así como interactuar con ellas mediante comentarios, etiquetas y categorías. La arquitectura implementada es **hexagonal**, lo que permite una separación clara entre las responsabilidades de las entidades y sus respectivas lógicas.

Este sistema está orientado exclusivamente al **backend**, sin integración con un frontend, y está optimizado para ofrecer un servicio robusto y escalable mediante **Spatie Query Builder** para filtros avanzados.

---

## **Características Principales**

### **Roles y Permisos**
- **Roles**:
  - `Admin`: Gestión completa de publicaciones, comentarios, categorías, etiquetas y usuarios.
  - `Author`: Puede gestionar únicamente sus propias publicaciones y responder a comentarios.
  - `Reader`: Tiene acceso a consultar publicaciones y agregar comentarios.
- **Permisos**:
  - Gestionados mediante el paquete **Spatie Laravel Permission**, garantizando un control de acceso robusto y flexible.

---

### **Gestión de Publicaciones**
1. **CRUD**:
   - Crear, actualizar, leer y eliminar publicaciones.
   - Los autores tienen acceso restringido a sus propias publicaciones.
2. **Categorías y Etiquetas**:
   - Organización de publicaciones mediante categorías predefinidas y etiquetas dinámicas.
   - Relación **muchos a muchos** entre publicaciones y etiquetas.
3. **Publicaciones Destacadas**:
   - Soporte para marcar publicaciones como destacadas.
4. **Filtros Avanzados**:
   - Búsqueda y filtrado flexible utilizando **Spatie Query Builder**:
     - Filtros por categorías, etiquetas, autor, rango de fechas, popularidad, entre otros.

---

### **Comentarios**
1. **CRUD de Comentarios**:
   - Los usuarios pueden agregar, actualizar y eliminar comentarios.
   - Los comentarios están anidados, permitiendo respuestas jerárquicas.
2. **Moderación**:
   - Los administradores pueden gestionar todos los comentarios.

---

### **Interacciones con las Publicaciones**
1. **Reacciones**:
   - Los usuarios pueden dar "me gusta" a las publicaciones.
2. **Conteo de Vistas**:
   - Seguimiento del número de vistas por publicación.
3. **Listados Populares y Recientes**:
   - Orden por popularidad (likes y vistas) y fecha de creación.

---

### **Notificaciones**
- Notificaciones del sistema para eventos clave, como nuevos comentarios en una publicación.

---

## **Arquitectura**
El proyecto implementa la **arquitectura hexagonal**, asegurando una separación clara entre:
1. **Capa de Dominio**:
   - Contiene las reglas de negocio de cada entidad: Publicaciones, Comentarios, Categorías y Etiquetas.
2. **Capa de Aplicación**:
   - Orquesta los casos de uso de las entidades, como la creación de publicaciones o la asignación de etiquetas.
3. **Adaptadores**:
   - API REST para exponer los servicios al cliente.
   - Interacción con la base de datos mediante Eloquent ORM.

---

## **Estructura de la Base de Datos**
1. **Tablas principales**:
   - `users`: Almacena los usuarios y sus roles.
   - `posts`: Detalles de las publicaciones.
   - `categories`: Categorías predefinidas.
   - `tags`: Etiquetas dinámicas.
   - `post_tag`: Tabla pivot para la relación entre publicaciones y etiquetas.
   - `comments`: Comentarios asociados a publicaciones.
   - `likes`: Registro de "me gusta" en publicaciones.
   - `views`: Seguimiento de vistas por publicación.

---

### **Pasos para Clonar y Ejecutar el Proyecto**

1. Clona el repositorio desde GitHub:

```bash
git clone https://github.com/odiseo153/Blog-Api.git
cd Blog-Api
```

2. Instala las dependencias:

```bash
composer install
```

3. Configura el archivo de entorno:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configura la base de datos en el archivo `.env` y migra las tablas:

```bash
php artisan migrate
```

5. Arranca el servidor local:

```bash
php artisan serve
```

El proyecto estará disponible en [http://localhost:8000](http://localhost:8000).

---

## **Tecnologías y Paquetes**
- **Laravel Sanctum**: Autenticación y protección de rutas.
- **Spatie Laravel Permission**: Gestión de roles y permisos.
- **Spatie Query Builder**: Búsquedas y filtros avanzados en los endpoints.
- **Eloquent ORM**: Interacción con la base de datos.
- **PHPUnit**: Pruebas unitarias y funcionales.

---

## **Resultado Final**
El sistema proporciona un backend robusto y escalable para la gestión de blogs. La arquitectura hexagonal garantiza mantenibilidad y adaptabilidad para futuras expansiones.