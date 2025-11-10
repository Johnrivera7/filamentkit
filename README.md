## FilamentKit

FilamentKit es mi kit de inicio oficial para construir paneles de administración con Filament 4 sobre Laravel 12. Incluye autenticación reforzada, permisos administrados con Shield, inicio de sesión social listo para conectar y monitoreo de correo electrónico con paneles dedicados. Incorporé automatizaciones y mejoras para que solo tengas que personalizar tus credenciales y comenzar a entregar valor.

### Características destacadas

- Tema Brisk con soporte de modo oscuro, selector de tema y UI mejorada en el flujo de autenticación.
- Gestión de roles y permisos con Filament Shield y recursos preconfigurados.
- Inicio de sesión vía OAuth2 (GitHub, Google y Microsoft) utilizando Filament Socialite + Socialite Providers.
- Impersonación de usuarios con acciones listas en `UserResource`.
- Panel de inteligencia de correo con Filament Mails para visualizar, reenviar y auditar envíos.
- Widgets de monitoreo, registros de actividad y utilidades de depuración para entornos locales.
- Widgets de analítica con Apex Charts para construir dashboards personalizados en minutos.
- Exportaciones rápidas a Excel (acciones por lote y cabecera) gracias a Filament Excel.
- Guardián de inactividad configurable para cerrar sesiones ociosas (Inactivity Guard).
- Automatizaciones disponibles vía comandos `php artisan project:*` para preparar, actualizar y optimizar el kit.
- Widgets de monitoreo, registros de actividad y utilidades de depuración para entornos locales.

### Stack principal

- [Laravel 12](https://laravel.com/)
- [Livewire 3](https://livewire.laravel.com/)
- [Filament 4](https://filamentphp.com/)

### Paquetes incluidos

- **Experiencia de Panel**
  - `filafly/brisk`
  - `filafly/filament-phosphor-icons`
  - `awcodes/light-switch`
  - `awcodes/overlook`
  - `diogogpinto/filament-auth-ui-enhancer`
  - `jeffgreco13/filament-breezy`
  - `dutchcodingcompany/filament-developer-logins`
- **Seguridad y permisos**
  - `bezhansalleh/filament-shield`
  - `unknow-sk/filament-logger`
  - `gboquizosanchez/filament-log-viewer`
  - `stechstudio/filament-impersonate`
  - `lab404/laravel-impersonate`
- **Protección y productividad**
  - `eightcedars/filament-inactivity-guard`
  - `pxlrbt/filament-excel`
- **Integraciones adicionales**
  - `dutchcodingcompany/filament-socialite`
  - `socialiteproviders/microsoft`
  - `backstage/filament-mails`
  - `marcelweidum/filament-expiration-notice`
  - `leandrocfe/filament-apex-charts`
- **Herramientas de desarrollo**
  - `barryvdh/laravel-debugbar`
  - `barryvdh/laravel-ide-helper`
  - `laravel/boost`

### Compatibilidad

| Versión del kit | Versión de Filament |
|-----------------|---------------------|
| 1.x             | 4.x                 |

### Instalación

1. **Crear un nuevo proyecto**

    ```bash
    composer create-project --prefer-dist jrivera/filamentkit nombre-del-proyecto
    cd nombre-del-proyecto
    ```

2. **Configurar entorno**
   - Duplica `.env.example` en `.env`.
   - Define `APP_URL`, credenciales de base de datos y claves para GitHub/Google/Microsoft:

        ```dotenv
        GITHUB_CLIENT_ID=...
        GITHUB_CLIENT_SECRET=...
        GITHUB_REDIRECT_URI="${APP_URL}/admin/oauth/callback/github"

        GOOGLE_CLIENT_ID=...
        GOOGLE_CLIENT_SECRET=...
        GOOGLE_REDIRECT_URI="${APP_URL}/admin/oauth/callback/google"

        MICROSOFT_CLIENT_ID=...
        MICROSOFT_CLIENT_SECRET=...
        MICROSOFT_REDIRECT_URI="${APP_URL}/admin/oauth/callback/microsoft"
        MICROSOFT_TENANT=common # opcional: common | organizations | consumers | <tenant-id>
        ```

   - Configura el driver de correo que utilizarás con Filament Mails (`MAIL_MAILER`, `MAIL_HOST`, etc.).

3. **Ejecutar comandos iniciales**

    ```bash
    php artisan key:generate
    php artisan migrate
    php artisan shield:setup
    php artisan storage:link
    bun install && bun run build
    ```

4. **Generar permisos y seeders cuando agregues recursos**

    ```bash
    php artisan project:update
    ```

5. **Otras automatizaciones útiles**

    ```bash
    php artisan project:init      # prepara ambientes locales: migraciones, seeders, permisos
    php artisan project:cache     # limpia y regenera caches de la aplicación
    php artisan dev:init          # helpers IDE, ide-helper y demás tareas de desarrollo
    php artisan project:recache   # fuerza recacheo completo (útil tras cambios profundos)
    ```

### Inicio de sesión social

- Registra tus aplicaciones OAuth en GitHub, Google y Microsoft utilizando las URL de callback indicadas.
- Para Microsoft utilizamos `socialiteproviders/microsoft`; el kit ya registra el listener en `App\Providers\AppServiceProvider`.
- Ajusta proveedores en `app/Providers/Filament/AdminPanelProvider.php` si deseas agregar más redes o modificar iconos/colores.
- De forma predeterminada el registro automático está deshabilitado (`->registration(false)`); puedes cambiarlo para permitir la creación de usuarios desde los proveedores sociales.
- Si necesitas dominios permitidos, implementa lógica adicional en `FilamentSocialitePlugin::make()->authorizeUserUsing(...)`.

### Monitoreo de correos

- Las rutas y el recurso de Filament Mails ya están registrados en el panel bajo el grupo **Administration**.
- Limita el acceso asignando el permiso `manage mails` a los roles pertinentes.
- Revisa `config/mails.php` y `config/filament-mails.php` para personalizar retención, limpieza y experiencia de navegación.
- Define correos de alerta con la variable `MAILS_ALERT_RECIPIENTS=email1@example.com,email2@example.com` si deseas notificaciones automáticas.

### Comandos útiles

- `php artisan project:init` – Ejecuta tareas de inicialización (migraciones, seeders, permisos).
- `php artisan project:cache` – Refresca los caches aplicables.
- `php artisan dev:init` – Genera ayudas IDE y tipados.

> Asegúrate de revisar y ajustar los comandos personalizados contenidos en `app/Console/Commands` según las políticas de tu organización.

### Impersonación

- La acción de impersonar aparece en la tabla de usuarios y en la vista de edición; requiere el permiso `impersonate users` o el rol `super_admin`.
- Agrega `<x-impersonate::banner/>` a tus layouts públicos si tus usuarios navegan fuera de Filament mientras impersonas.
- Puedes controlar la autorización con `canImpersonate()` y `canBeImpersonated()` en `App\Models\User`.

### Apex Charts

- El plugin `leandrocfe/filament-apex-charts` ya está registrado; crea widgets con `php artisan make:filament-apex-charts NombreDelWidget`.
- Aprovecha los métodos `getOptions()` y `filtersSchema()` para personalizar datos, filtros y polling de tus dashboards.

### Exportar a Excel

- Gracias a `pxlrbt/filament-excel`, todos los recursos pueden añadir exportaciones masivas con una línea. `UserResource` ya incluye la acción en la barra de herramientas.
- La acción soporta columnas dinámicas, múltiples formatos (`XLSX`, `CSV`, `TSV`), colas y personalización completa mediante `ExcelExport`.
- Ajusta los permisos en Shield si quieres limitar la exportación y, para volúmenes grandes, activá `->queue()` y configura un worker de colas.

### Inactividad

- El plugin `eightcedars/filament-inactivity-guard` protege tu panel cerrando sesiones ociosas tras un periodo configurable.
- El proveedor `AdminPanelProvider` define un timeout por defecto (15 minutos) y muestra un aviso de 60 segundos antes de cerrar sesión; personalízalo en `config/filament-inactivity-guard.php`.
- Puedes deshabilitarlo en entornos locales o ajustar eventos que mantienen viva la sesión (`interaction_events`).

- Ajusta la columna `notice_timeout` si quieres cerrar la sesión inmediatamente cuando el usuario quede inactivo.

### Automatizaciones disponibles

- `php artisan project:init` – ejecuta las tareas esenciales para ambientes frescos (migraciones, seeders, permisos de Shield, enlaces de almacenamiento).
- `php artisan project:update` – pensado para después de agregar recursos o migraciones; actualiza permisos y ejecuta migraciones pendientes.
- `php artisan project:cache` / `php artisan project:recache` – regenera caches de configuración, rutas y vistas.
- `php artisan dev:init` – corre herramientas de soporte como IDE helper, debug seeds, etc.
- Todos estos comandos son personalizables en `app/Console/Commands`.

### Licencia

FilamentKit se distribuye bajo la licencia [MIT](LICENSE.md). Si te resulta útil, agradezco una estrella y tu retroalimentación.

---

Autor principal: **John Rivera González**  
Correo: [johnriveragonzalez7@gmail.com](mailto:johnriveragonzalez7@gmail.com)  
GitHub: [@Johnrivera7](https://github.com/Johnrivera7)
