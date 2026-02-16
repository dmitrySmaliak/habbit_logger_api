# Docker + Laravel + React Template Repository

Project uses Laravel + React build application 
In project actively uses next plugins and packages:

* https://react.dev
* https://laravel.com
* https://tailwindcss.com
* https://reactrouter.com

### 1. Prepare Project
1. Clone the sources to your local machine.
2. Run `cp .env.example .env` and fullfil with need variables.
2. Run `make init`.

### 2. Run Project
1. Run `make start`.
2. App starts on: http://localhost:8000
3. phpMyAdmin start on: http://localhost:8080
    - Credentials:
        - login: `root`, 
        - password: `root`

#### Lint commands
1. For Frontend:
   - Run `make node-lint`
2. For Backend:
   - Run `make php-lint`

### 3. Additional Short Commands
You can find then in Makefile
Most usefully commands:
1. Run `make php-bash`.
2. Run `make node-bash`.
3. Run `make migrate`.
4. Run `make down`.

### 4. Git Flow

#### Branch Naming Conventions

1. **Allowed Branch Names**:
   - **Feature Branches**: `feat/DLR-{number}`
   - **Bug Fix Branches**: `fix/DLR-{number}`
   - **Hotfix Branches**: `hotfix/{short_alias}`
   - **Release Branches**: `release/{date}-v{version}`
     - `date` should be in `dd.mm.yy` format.
     - `version` should be in `x.y.z` format.

2. We have 2 main branches:
   - `master` - for production builds
   - `develop` - for local development

#### Commit Message Conventions

3. **Allowed Commit Message Prefixes**:
   - For **Feature Branches**: `DLR-{number}.`
   - For **Bug Fix Branches**: `DLR-{number}.`
   - For **Hotfix Branches**: `hotfix.`
   - For **Merge Commits**: `Merge`

4. **Commit Message Prefixes Must Match the Branch Name**:
   - For **Feature Branches**: `DLR-{number}.` should match `feat/DLR-{number}`
   - For **Bug Fix Branches**: `DLR-{number}.` should match `fix/DLR-{number}`
   - For **Hotfix Branches**: `hotfix.` should match `hotfix/{short_alias}`

#### Pull Request Title Rules

5. **Pull Request Title Rules**:
   - For **Feature Branches** (`feat/DLR-{number}`): PR title should start with `Feat/DLR-{number}.` followed by a brief summary.
     - Example: `Feat/DLR-23. Implement new feature`
   - For **Bug Fix Branches** (`fix/DLR-{number}`): PR title should start with `Fix/DLR-{number}.` followed by a brief summary.
     - Example: `Fix/DLR-45. Correct typo in documentation`
   - For **Hotfix Branches** (`hotfix/{short_alias}`): PR title should start with `Hotfix.` followed by a brief summary.
     - Example: `Hotfix. Resolve critical issue`
   - For **Release Branches** (`release/{date}-v{version}`): PR title should start with `Release/{date}-v{version}`.
     - Example: `Release/24.06.24-v1.0.0`

### 5. Release Flow

To release a build, follow these steps:

1. **Update Version**:
   - Update the version in `package.json`.

2. **Release Branch Creating**:
   - Create a new branch named `release/{date}-v{version}` from `develop`.
   - Make Pull Request into `master`.
   - Select simple `Merge` option to merge Pull Request in `master`

   - Add Pull Request description for PR in `master` (needed to build release description).
     - After creating of Pull Request you can run in dev tools code to copy info from commits messages. (be sure that all commits are loaded and visible on page)

        ```javascript
          copy(Array.from(document.querySelectorAll('.TimelineItem-body')).reverse().map(e => ({
            title: e.querySelector('a[href*="/commits/"][title]')?.getAttribute('title') || '',
            commit: e.querySelector('a[href*="/commits/"]:not([title])')?.innerText || '',
          })).filter(({ title }) => title).map(e => `(${e.commit}) ${e.title}`).join('\n'))
        ```
