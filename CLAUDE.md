# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Common Development Commands

### Testing
- Run all tests: `vendor/bin/codecept run`
- Run unit tests only: `vendor/bin/codecept run Unit`
- Run tests with coverage: `vendor/bin/codecept run --coverage`

### Code Quality
- Run PHPStan static analysis: `vendor/bin/phpstan analyse`
- Check PHPStan configuration in `phpstan.neon` (level 6)

### Installation
- Install dependencies: `composer install`
- Install with dev dependencies: `composer install --dev`

## Architecture Overview

This is a Pimcore bundle that wraps static method calls in service-oriented architecture. The bundle follows a consistent 4-layer pattern:

### Core Architecture Pattern
1. **Contract Interfaces** (`src/Contract/*/`): Public API interfaces (e.g., `DbResolverContractInterface`)
2. **Contract Implementations** (`src/Contract/*/`): Wrap static calls (e.g., `DbResolverContract`) 
3. **Bundle Interfaces** (`src/*/`): Internal interfaces extending contracts (e.g., `DbResolverInterface`)
4. **Bundle Implementations** (`src/*/`): Final implementations marked `@internal` (e.g., `DbResolver`)

### Key Components
- **Resolver Services**: Transform static calls into injectable services for better testability
- **Proxy Services**: Handle dynamic method interception (deprecated functionality)
- **DI Container**: Auto-configured services via `config/services.yaml`

### Directory Structure
- `src/Contract/`: Public API contracts for third-party developers
- `src/Db/`, `src/Lib/`, `src/Models/`: Bundle-specific implementations (internal use)
- `src/Proxy/`: Legacy proxy functionality (deprecated)
- `tests/Unit/`: Comprehensive unit test coverage

## Development Guidelines

### Adding New Resolvers
1. Create contract interface in `src/Contract/[Category]/`
2. Implement contract wrapping static calls
3. Create bundle-specific interface extending contract
4. Create final implementation marked `@internal`

### Service Registration
Services are auto-registered via PSR-4 in `config/services.yaml`. Manual registration only needed for interface bindings.

### Testing Strategy
- All resolvers have corresponding unit tests in `tests/Unit/`
- Tests use Codeception framework
- Coverage reports enabled in `codeception.dist.yml`

## Important Notes
- Contract interfaces are public API for third-party developers
- Bundle-specific interfaces marked `@internal` are for Pimcore internal use only
- Bundle provides migration path from static methods to dependency injection
- PHPStan baseline exists (`phpstan-baseline.neon`) for existing code