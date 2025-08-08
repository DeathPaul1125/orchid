# 💳 Sistema para Venta de Créditos

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Orchid](https://img.shields.io/badge/Orchid-5B3CC4?style=for-the-badge&logo=orchid&logoColor=white)](https://orchid.software)

Sistema desarrollado con **Laravel** y **Orchid** para la gestión y venta de créditos de manera eficiente, segura y escalable.

---

## 📸 Vista Previa

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" width="80"/>
  &nbsp;&nbsp;&nbsp;
  <img src="https://orchid.software/img/logo.svg" alt="Orchid" width="140"/>
</p>

---

## 🚀 Características Principales

- Gestión de clientes y créditos.
- Interfaz administrativa con **Orchid Platform**.
- Arquitectura sólida basada en **Laravel**.
- Panel seguro con autenticación y roles.
- Base de datos relacional y escalable.
- Reportes y estadísticas.

---

## 🛠️ Tecnologías Usadas

- **Backend:** [Laravel](https://laravel.com) (PHP Framework)
- **Frontend Administrativo:** [Orchid Platform](https://orchid.software)
- **Base de Datos:** MySQL / PostgreSQL
- **Autenticación:** Laravel Breeze / Sanctum
- **Estilos:** TailwindCSS

---

## 📦 Instalación

```bash
# Clonar el repositorio
git clone https://github.com/usuario/venta-creditos.git

# Entrar al directorio
cd venta-creditos

# Instalar dependencias
composer install
npm install && npm run dev

# Configurar variables de entorno
cp .env.example .env

# Generar key
php artisan key:generate

# Migrar base de datos
php artisan migrate --seed

# Levantar servidor
php artisan serve
