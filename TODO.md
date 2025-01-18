# Roadmap

### Utilies
- [] Index Boilerplate
- [] Auto Admin UI for filament

## Commands
### Install Boilerplate
```bash
anvil:boilerplate
```
Intall basic boilerplate for the project
- Basic API structure
    - Controller
    - Request
    - Resource
    - Token Type
    - Api Config
- Code beatuifier + GIT Hooks
- Authenticaion - Ask to the user
- Install Filament


### Make Model
```bash
anvil:make model ModelName
    --no-admin
    --no-factory
    --no-migration
    --no-seeder
    --no-resource
```
Creates a model with APIs, Admin Interface, Factory, Migration, Seeders, Resource

### Edit
```bash
anvil:edit model ModelName --amend
```
Edit an existing model, --amend will edit the same migration file and will not create a new one


