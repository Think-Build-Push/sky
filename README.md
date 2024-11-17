## Sky

![Static Badge](https://img.shields.io/badge/version-1.0--alpha-blue)  
![GitHub License](https://img.shields.io/github/license/StrangeSpaceBaby/sky)  
![GitHub Discussions](https://img.shields.io/github/discussions/StrangeSpaceBaby/sky)  
![GitHub Issues or Pull Requests](https://img.shields.io/github/issues/StrangeSpaceBaby/sky)
![GitHub Issues or Pull Requests](https://img.shields.io/github/issues-closed/StrangeSpaceBaby/sky)  
![GitHub Issues or Pull Requests](https://img.shields.io/github/issues-pr/StrangeSpaceBaby/sky)
![GitHub Issues or Pull Requests](https://img.shields.io/github/issues-pr-closed/StrangeSpaceBaby/sky)  
![GitHub Downloads (all assets, all releases)](https://img.shields.io/github/downloads/StrangeSpaceBaby/sky/total)  
![GitHub Repo stars](https://img.shields.io/github/stars/StrangeSpaceBaby/sky)
![GitHub watchers](https://img.shields.io/github/watchers/StrangeSpaceBaby/sky)  

If you're looking for documentation, check out it out at [https://getskyflare.com](https://getskyflare.com)

Sky's first production ready release will be January 28th, 2025.

Sky is an API backend framework using PHP 8.3 and only a very few vendor packages. Sky was built to enable developers to create quick prototypes that can be iteratively and atomically improved as your application matures. Sky is performant, secure and easy to use. Although there is a lot left to do, Sky has already been used to build real world applications with demanding requirements.

## Requirements
* PHP 8.2+,  8.3+ is even better
* MySQL 8+, MariaDB 10.2+ is even better
* Apache 2.2+, 2.4+ is even better

### Focused on B2B SaaS applications

It's hard for one framework to be all things in all contexts.  Sky is being built to support the hardest web context - B2B SaaS applications. Sky has been used to make games and other non-business applications, but primarily Sky's focus is to help tech entrepreneurs get up and running with robust features and tools baked into the DNA of the application. With a built-in web interface to help you manage data and setup new entities, Sky aims to help you build fast and iterate quickly.

### Unary Execution Path

Sky's core design principle is the unary execution path. Basically, taking its inspiration from the blood brain barrier of the human body, Sky only allows one way in and one way out of the application through the various execution domains. Application risk increases in proximity to the database. By ensuring that there is only one way in and one way out, Sky can more easily create "blood brain barriers" between each application layer and protect data as well as provide more expressive and helpful logging and errors.

If you want to read more about this and other core concepts, check out [Sky Concepts](https://www.getskyflare.com/#sky_concepts)

### Multi-tenant

Row level multi-tenancy is hard to do consistently and Sky makes it a breeze. Sky's core data entity is the company (`_co`).  Simply adding a column called `_co_id` to a table will let Sky know you want to have row-level data segregation. Every other code point builds on top of that fundamental convention. Sky is built from the ground up to manage and maintain a single database, multi-tenant (SDMT) application. Sky could easily support multi-database, multi-tenant (MDMT) applications but would also require more infrastructure coordination.  Sky does not currently support MDMT applications out of the box.

The safest method to enforce data segregation starts with the subdomain of your app. Hackers can't spoof the entry point to your application if you use subdomains to identify tenants. Sky defaults to using subdomains and setting the tenant scope at the top of the call stack. Sky also supports url prefix routing with a simple change. Although less secure, nevertheless, Sky will enforce data segregation as early as possible in the call stack to ensure that data is only available to its owning `_co`.

### Convention over Configuration

To maintain a high throughput, Sky prefers convention over configuration. That's not to say Sky is rigid, it's very flexible for every need. But rather than litter code with configuration files that require lookup to understand how an application is expected to behave, Sky uses conventions to be able to accurately guess what an application needs based on some core rules. This cuts down on file I/O and configuration errors so that Sky is more reliable and faster than most frameworks out there while still allowing for expressive applications.
