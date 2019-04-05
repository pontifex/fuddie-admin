## Administration App for Fuddie

### Up and running in 1 hour

Assumptions:
* Git installed and configured on host
* Docker installed and configured on host

Steps:
* ```git clone git@github.com:pontifex/fuddie_admin.git```
* ```cd fuddie_admin```
* ```docker-compose up```
* ```docker exec -i container_phpfpm_fuddie_admin composer install```
* ```docker exec -i container_phpfpm_fuddie_admin php bin/console doctrine:migrations:migrate --em=acl```

After those steps app should be available on ```http://localhost```

### Multi db
Two databases are set up locally, one is `fuddie_local` (port 3305 on your localhost) for original Fuddie content and
second is `fuddie_admin_local` (port 3306 on your localhost) for ACL related stuff. Please overwrite config when 
deploying to staging / production.

### Code checker (symfony rules applied)
Nothing changed in code:

```docker exec -it container_phpfpm_fuddie_admin vendor/bin/php-cs-fixer fix ./src --config=.php_cs.dist -v --dry-run --diff```

Code may be changed:

```docker exec -it container_phpfpm_fuddie_admin vendor/bin/php-cs-fixer fix ./src --config=.php_cs.dist -v --diff```

### Functional tests
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=admin```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=category```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=company```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=miniGame```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=order```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=payment```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=restaurant```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=waiter```

### System design overview
- Voters located on src/Security determines if user (admin) is granted to do an action. Example: 
```WaiterEntityVoter::canShow(Waiter $waiter, Admin $admin)```
decides if user can execute show action on specific Waiter instance.

- Filters located on src/Security/Filters filters for user (admin) content of LIST and SEARCH actions. Example:
```WaiterEntityFilter``` determines what is shown on ```http://localhost/admin/?entity=Waiter&action=list&menuIndex=8&submenuIndex=-1```.

- Filters located on src/Security/Filters are also used to filter related collections for ADD and EDIT actions. Example:
```CompanyEntityFilter``` determines what is shown on ```http://localhost/admin/?entity=Restaurant&action=new&menuIndex=7&submenuIndex=-1```
for FkCompany collection.

- Adding new entity to the system:
1) Edit config/packages/easy_admin.yaml sections design.menu and entities
2) Create Voter for entity on src/Security
3) Create Filter for entity on src/Security/Filter
4) Add controller for your entity in src/Controller
5) Entity should appear in menu automatically (if you have permission to see LIST action on Entity). Enjoy!

# Gitflow workflow

We use Gitflow workflow described in details here: https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow .

Please do not add commits directly to those branches: ***develop*** and ***master***.

Please use feature / fix branches instead.

Below I describe general points developer should follow to add something to campusink repository (example for develop branch, do analogically for master branch).
* create a branch from develop following naming pattern:
 ```your-initials/feature/short-name-of-what-do-you-do```
* add your changes and commit them using ***only one commit***, notice 
```git commit -m "Message does here" --amend``` and ```git rebase``` are your friends,
 details here: https://www.atlassian.com/git/tutorials/rewriting-history
* once you have finished your implementation, please create PR against develop branch and do not merge your job without at least one approval
# Git Commit Guidelines

This part is taken from: https://gist.github.com/brianclements/841ea7bffdb01346392c

We have very precise rules over how our git commit messages can be formatted.  This leads to **more
readable messages** that are easy to follow when looking through the **project history**.  But also,
we use the git commit messages to **generate the campusink change log**.

### Commit Message Format
Each commit message consists of a **header**, a **body** and a **footer**.  The header has a special
format that includes a **type**, a **scope** and a **subject**:

```
<type>(<scope>): <subject>
<BLANK LINE>
<body>
<BLANK LINE>
<footer>
```

Any line of the commit message cannot be longer 100 characters! This allows the message to be easier
to read on github as well as in various git tools.

### Type
Must be one of the following:

* **feat**: A new feature
* **fix**: A bug fix
* **docs**: Documentation only changes
* **style**: Changes that do not affect the meaning of the code (white-space, formatting, missing
  semi-colons, etc)
* **refactor**: A code change that neither fixes a bug or adds a feature
* **perf**: A code change that improves performance
* **test**: Adding missing tests
* **chore**: Changes to the build process or auxiliary tools and libraries such as documentation
  generation

### Scope
The scope could be anything specifying place of the commit change. For example `$location`,
`$browser`, `$compile`, `$rootScope`, `ngHref`, `ngClick`, `ngView`, etc...

### Subject
The subject contains succinct description of the change:

* use the imperative, present tense: "change" not "changed" nor "changes"
* don't capitalize first letter
* no dot (.) at the end

### Body
Just as in the **subject**, use the imperative, present tense: "change" not "changed" nor "changes"
The body should include the motivation for the change and contrast this with previous behavior.

### Footer
The footer should contain any information about **Breaking Changes** and is also the place to
reference GitHub issues that this commit **Closes**.

A detailed explanation can be found in this [document][commit-message-format].

[commit-message-format]: https://docs.google.com/document/d/1QrDFcIiPjSLDn3EL15IJygNPiHORgU1_OOAqWjiDU5Y/edit#
