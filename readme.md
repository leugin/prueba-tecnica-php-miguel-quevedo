# Prueba técnica Miguel Quevedo

Esta es una prueba tecnica usando php
## Installation

Use the docker composer

```bash
docker compose -f docker-compose.install.yml up
```

## Server

```bash
docker compose up
```

## Tests

```bash
docker compose -f docker-compose.test.yml up
```

## Configuration
Para configurar el repositorio por base de datos o memoria use
InMemoryUserRepository => para memoria
SqliteDatabase => para sqlite 
cada uno tien su repositorio en 

### Para la base de datos correr primero

```bash
docker compose -f docker-compose.database.yml up
```
