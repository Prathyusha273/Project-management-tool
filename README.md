# Taskify SaaS

Taskify SaaS is the ultimate solution for project management, task management, CRM, and productivity, built on the robust Laravel 10 framework. It offers a comprehensive suite of features designed to streamline project coordination and enhance productivity for businesses of all sizes.

## Features

### Project Management Mastery
- **Elegant Dashboard:** Visualize project health at a glance. See key metrics like overdue tasks, upcoming deadlines, team workload distribution, and resource allocation.
- **Kanban Boards:** Organize tasks into visual stages (e.g., To-Do, In Progress, Done) for an easy-to-understand workflow. Drag and drop tasks to update their status.
- **Gantt Charts:** Plan and track project timelines visually. See dependencies between tasks and identify potential bottlenecks.
- **Task Dependencies:** Set dependencies between tasks so subsequent tasks only begin when their predecessors are complete.
- **Time Tracking:** Track time spent on tasks for better project estimation, resource allocation, and invoicing (if applicable).
- **File Sharing & Collaboration:** Attach files, documents, and images directly to tasks for centralized access and collaboration.
- **Task Comments & Mentions:** Discuss tasks within the platform using comments and mentions, keeping communication focused and transparent.
- **Internal & External Notes:** Add private notes for internal team discussions and separate notes for client communication.

### Organizational Prowess
- **Team Workspaces:** Create private workspaces for individual teams or projects, fostering focused collaboration and information security.
- **Client Portals:** Provide dedicated portals for clients to access project updates, milestones, files, and communication channels.
- **Advanced Search & Filtering:** Easily find specific tasks, projects, or users with advanced search and filtering options based on various criteria (e.g., due date, assignee, status, keywords).
- **Reporting & Analytics:** Generate insightful reports on project progress, team performance, workload distribution, and resource utilization. Customize reports to gain specific insights.

### Productivity Boosters
- **Task Templates:** Create pre-defined templates for frequently used tasks, saving time and ensuring consistency.
- **Recurring Tasks:** Schedule tasks to repeat on a daily, weekly, monthly, or yearly basis.
- **Start & End Dates:** Set clear start and end dates for projects and tasks to keep everyone on track.
- **Priority Levels:** Assign priority levels (e.g., High, Medium, Low) to tasks for better time management and focus.

### Global Accessibility
- **Multi-Language Support:** Offer Taskify SaaS in multiple languages to cater to a global workforce.
- **Multi-Timezone Support:** Display dates and times in the appropriate time zone for each user, ensuring clear communication across different locations.
- **Customizable Branding:** Tailor the platform's look and feel (logo, colors) to match your company's branding for a professional experience.

### Superadmin Panel - Command and Control
- **User Management:** Create, edit, and delete user accounts, assign roles and permissions, and manage team structures.
- **Billing Management:** Monitor subscription plans, manage invoices and payments, track user activity, and analyze subscription usage.
- **Security Management:** Configure security settings like two-factor authentication, data encryption, and user session timeout for enhanced platform security.
- **Audit Logs:** Track user activity logs for increased transparency and accountability.

---

## Installation

### Prerequisites
- PHP >= 8.x
- Composer
- MySQL (or compatible database)
- Node.js and npm (for frontend assets)
- [Laravel 10](https://laravel.com/docs/10.x/installation)

### Steps
1. **Clone the repository:**
   ```bash
   git clone https://github.com/Prathyusha273/Project-management-tool.git
   cd Project-management-tool
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node dependencies and build assets:**
   ```bash
   npm install
   npm run build
   ```

4. **Set up your `.env` file:**
   - Copy `.env.example` to `.env`
   - Configure your database and other environment variables.

5. **Run the installer:**
   - Visit `/install` route in your browser to start the installation wizard.
   - The installer will:
     - Validate database connection.
     - Import SQL dump (`taskify_saas.sql`).
     - Create default admin user and workspace.

6. **Migrate and seed the database (if needed):**
   ```bash
   php artisan migrate --seed
   ```

7. **Link storage and clear caches:**
   ```bash
   php artisan storage:link
   php artisan cache:clear
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```

8. **Start the development server:**
   ```bash
   php artisan serve
   ```

## Usage

### Creating Projects
- Navigate to the Projects section.
- Click "Create Project."
- Fill in details: Title, Status, Users, Clients, Tags, Description.
- Submit the form; you will automatically be added as a participant.

### Managing Tasks
- Within a project, create tasks with titles, deadlines, priorities, and assignees.
- Organize tasks visually via Kanban and Gantt charts.
- Use comments and mentions for collaboration.

### Workspace & Client Management
- Create separate workspaces for teams or departments.
- Add clients for each project, giving them portal access.

### Reports & Analytics
- Access project, task, and time tracking reports from the dashboard.

### Integrations
- Set up integrations for Google Calendar, Slack, WhatsApp, and more via the settings panel.

### FAQ
- **Multiple Projects:** The system supports multiple projects via dedicated workspaces.
- **Security:** Data security is ensured via encryption, authentication, and regular backups.
- **Integrations:** Integrate with popular productivity, communication, and file storage tools.

## API Documentation

### Notable Classes & Functions

#### PHP Controllers
- **InstallerController**
  - `index()`: Handles installation view.
  - `config_db(Request $request)`: Validates and updates DB config.
  - `install(Request $request)`: Performs installation steps and seeds data.

- **ProjectsController**
  - `store()`: Creates new projects.
  - `update()`: Updates projects and syncs relations.
  - `getMindMapData($project)`: Builds project mind map data for visualization.
  - `get_users(Request $request)`: Fetches users for mentions.

- **TasksController**
  - `store()`: Creates new tasks and assigns users.
  - Handles custom fields, status timelines, and notifications.

- **WorkspacesController**
  - Handles creation, update, user/client assignment, notifications, and logs.

#### Models
- **Project, Task, User, Client, Workspace, Status, Tag, etc.**
  - Standard Eloquent relationships for projects, tasks, clients, users, and workspaces.
  - Methods for attaching users/clients, managing relations, tracking time, etc.

#### JS Modules
- **project-grid.js:** Handles Kanban view, filtering, sorting, and navigation.
- **project-mind-map.js:** Manages mind map interactions.
- **gantt-chart.js:** Processes and visualizes Gantt charts.
- **project-information.js:** Handles project details, comments, and attachments.

## Developer Guide

### Architecture
- **Backend:** Laravel 10 (MVC structure)
- **Frontend:** Blade templates, Vue.js (if used), jQuery, Bootstrap
- **Assets:** Managed via npm and Laravel Mix/Vite.
- **Real-time:** Uses Pusher for notifications and chat.
- **Integrations:** Google Calendar, Slack, WhatsApp, etc.

### Contributing

1. **Fork the repository.**
2. **Create a new branch:**
   ```bash
   git checkout -b feature/your-feature
   ```
3. **Make your changes.**
4. **Test thoroughly.**
5. **Submit a pull request with a detailed description.**

#### Coding Standards
- Follow PSR-12 for PHP.
- Use ES6+ for JavaScript.
- Write meaningful commit messages.

#### Issue Reporting
- Use GitHub Issues for bugs and enhancements.
- Provide detailed steps, screenshots, and browser/version info.

### Recommended Workflow
- Pull latest changes from `main`.
- Work on feature branches.
- Run tests before pushing.
- Submit PRs with clear documentation.

## Support

For support, please contact info@infinitietech.com.

---

## License

This project does not specify a license. Please add one if you intend to open source or distribute the project.