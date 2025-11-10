<div align="center">

<img src="https://img.shields.io/badge/Filament-4.x-7b5cff?style=for-the-badge&logo=laravel&logoColor=white" alt="Filament 4 Badge" />
<img src="https://img.shields.io/badge/Laravel-12.x-ff2d20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12 Badge" />
<img src="https://img.shields.io/badge/Author-John%20Rivera-0ea5e9?style=for-the-badge&logo=github" alt="Author Badge" />

<br><br>

<h1>🛠️ FilamentKit</h1>
<p style="font-size: 1.05rem; max-width: 720px;">
Kit de inicio para construir paneles profesionales con Filament 4 sobre Laravel 12.
Incluye autenticación social, gestión de permisos, monitoreo de correos, exportación a Excel,
impersonación, guardián de inactividad y comandos automatizados para preparar cualquier entorno en minutos.
</p>

<a href="https://github.com/Johnrivera7/filamentkit/stargazers">
  <img src="https://img.shields.io/badge/⭐️%20Deja%20una%20estrella-27272a?style=for-the-badge" alt="Star badge" />
</a>

</div>

---

## ✨ Características destacadas

| Área | Qué incluye |
| --- | --- |
| 🎨 Experiencia | Tema Brisk con modo oscuro, selector de tema y login mejorado. |
| 🔐 Seguridad | Filament Shield con menú de roles, auditoría de actividad y panel administrativo dedicado. |
| 👤 Usuarios | Autenticación clásica + Socialite (GitHub, Google, Microsoft) + impersonación segura. |
| 📈 Observabilidad | Panel administrativo con métricas y bitácora de accesos, log viewer y mails monitor. |
| 📊 Analítica | Widgets listos para Apex Charts y exportación masiva a Excel. |
| 💤 Inactividad | Guardián que cierra sesiones ociosas con aviso configurable. |
| ⚙️ Automatización | Comandos `php artisan project:*` para inicializar, actualizar y optimizar el kit. |

---

## 🧰 Paquetes incluidos

<details>
<summary><strong>🎛️ Experiencia de panel</strong></summary>

`filafly/brisk`, `filafly/filament-phosphor-icons`, `awcodes/light-switch`, `awcodes/overlook`, `diogogpinto/filament-auth-ui-enhancer`, `jeffgreco13/filament-breezy`, `dutchcodingcompany/filament-developer-logins`
</details>

<details>
<summary><strong>🛡️ Seguridad y permisos</strong></summary>

`bezhansalleh/filament-shield`, `unknow-sk/filament-logger`, `gboquizosanchez/filament-log-viewer`, `stechstudio/filament-impersonate`, `lab404/laravel-impersonate`
</details>

<details>
<summary><strong>⚙️ Productividad y operatividad</strong></summary>

`eightcedars/filament-inactivity-guard`, `pxlrbt/filament-excel`
</details>

<details>
<summary><strong>🔌 Integraciones</strong></summary>

`dutchcodingcompany/filament-socialite`, `socialiteproviders/microsoft`, `backstage/filament-mails`, `marcelweidum/filament-expiration-notice`, `leandrocfe/filament-apex-charts`
</details>

<details>
<summary><strong>🧑‍💻 Herramientas de desarrollo</strong></summary>

`barryvdh/laravel-debugbar`, `barryvdh/laravel-ide-helper`, `laravel/boost`
</details>

---

## 📦 Compatibilidad

| Versión del kit | Filament | PHP |
| --------------- | -------- | --- |
| 1.x             | 4.x      | >= 8.3 |

---

## 🚀 Instalación guiada

> Sigue cada paso en orden; los comandos resaltados son **obligatorios** para que Shield genere navegación y permisos correctamente.

1. **Crear el proyecto**
   ```bash
   composer create-project --prefer-dist jrivera/filamentkit nombre-del-proyecto
   cd nombre-del-proyecto
   ```

2. **Configurar variables**
   ```dotenv
   cp .env.example .env
   APP_URL=https://tu-dominio.test

   GITHUB_CLIENT_ID=...
   GITHUB_CLIENT_SECRET=...
   GITHUB_REDIRECT_URI="${APP_URL}/admin/oauth/callback/github"

   GOOGLE_CLIENT_ID=...
   GOOGLE_CLIENT_SECRET=...
   GOOGLE_REDIRECT_URI="${APP_URL}/admin/oauth/callback/google"

   MICROSOFT_CLIENT_ID=...
   MICROSOFT_CLIENT_SECRET=...
   MICROSOFT_REDIRECT_URI="${APP_URL}/admin/oauth/callback/microsoft"
   MICROSOFT_TENANT=common

   MAIL_MAILER=smtp
   MAIL_HOST=...
   MAIL_USERNAME=...
   MAIL_PASSWORD=...
   ```

3. **Preparar dependencias y assets**
   ```bash
   composer install           # por si agregas dependencias extra
   bun install && bun run build
   ```

4. **Inicializar la aplicación (orden recomendado)**
   ```bash
   php artisan key:generate
   php artisan migrate
   php artisan storage:link
   php artisan shield:setup   # genera roles, permisos y menú "Roles & Permissions"
   php artisan project:init   # migra, seeders base, permisos y tareas de bootstrap
   ```

5. **Actualizar tras cada cambio estructural**
   - Nuevos recursos, páginas o migraciones → `php artisan project:update`
   - Cambios de configuración o helpers     → `php artisan project:cache` y/o `php artisan project:recache`
   - Necesitas tipados/IDE helpers          → `php artisan dev:init`
   - Permisos puntuales sin recrear todo    → `php artisan shield:generate --all`

6. **Checklist post-despliegue**
   - Revisar `config/filament-inactivity-guard.php` según políticas de sesión.
   - Crear tu usuario administrador y otorgarle el rol `super_admin`.
   - Verificar que el nuevo **Panel administrativo** (menú Administración) muestre métricas y registros.

---

## 🗺️ Módulos del panel

- **Dashboard principal**: limpio, sin widgets intrusivos, ideal para que agregues tus propios KPIs.
- **Panel administrativo**: nueva página que agrupa Overlook (estadísticas de usuarios) y la tabla de accesos recientes.
- **Roles & Permissions**: expuesto vía Filament Shield listo para administrar el RBAC.
- **Filament Mails**: monitor de envíos, eventos y reenvíos desde el mismo panel.

---

## 📡 Integraciones explicadas

- **Socialite extendido** – GitHub, Google y Microsoft listos; agrega dominios permitidos desde `FilamentSocialitePlugin::authorizeUserUsing`.
- **Filament Mails** – Ejecuta `php artisan vendor:publish --tag="filament-mails-config"` si necesitas personalizar recursos o rutas.
- **Excel & Exportaciones** – Acción masiva disponible en `UserResource`; puedes añadirla a cualquier tabla con una sola línea.
- **Inactivity Guard** – Valor por defecto: 15 min de inactividad + 60 s de alerta antes del logout. Personaliza en `config/filament-inactivity-guard.php`.

---

## 🧾 Automatizaciones y cuándo usarlas

| Comando | Cuándo ejecutarlo | Qué hace |
| ------- | ----------------- | -------- |
| `php artisan project:init` | Proyecto recién clonado o desplegado | Migra DB, genera permisos, ejecuta tareas de arranque. |
| `php artisan project:update` | Después de crear/actualizar un Resource, Page, Widget o migración | Ejecuta migraciones pendientes y regenera permisos de Shield. |
| `php artisan shield:setup` | Primera vez (obligatorio) o cuando quieras rehacer la matriz de permisos | Inicializa roles, permisos y asignaciones base. |
| `php artisan shield:generate --all` | Tras cambios puntuales en recursos sin usar `project:update` | Regenera políticas y permisos detectados. |
| `php artisan project:cache` / `project:recache` | Cambios en config/env antes de producción | Limpia y vuelve a generar caches de config, rutas y vistas. |
| `php artisan dev:init` | Cada vez que quieras refrescar helpers IDE o Pint | Ejecuta IDE Helper, Debugbar y demás utilidades de desarrollo. |

> 💡 Sugerencia: crea scripts en tu CI/CD que corran `project:init` y `project:cache` para mantener los ambientes sincronizados.

---

## 🤝 Contribuciones y soporte

- Ajusta o extiende los comandos en `app/Console/Commands` según las políticas de tu organización.
- Crea widgets propios en `App\Filament\Admin\Widgets` y añádelos al **Panel administrativo**.
- ¿Necesitas multi-tenant? Shield y Socialite ya soportan esa arquitectura; sólo habilita el modo correspondiente.

---

## 📄 Licencia & Autor

FilamentKit se distribuye bajo la licencia [MIT](LICENSE.md).

**Autor:** John Rivera González  
**Correo:** [johnriveragonzalez7@gmail.com](mailto:johnriveragonzalez7@gmail.com)  
**GitHub:** [@Johnrivera7](https://github.com/Johnrivera7)

Si este kit te ahorra tiempo, ¡déjame una ⭐️ en GitHub!
