# API System Tests

This directory contains comprehensive system tests for the Hair Transplant Management System API. The tests are designed to validate all API endpoints, session management, authentication, and role-based access control.

## Overview

The test suite includes:

- **TestBase.php** - Base test class with common functionality
- **SessionAuthTest.php** - Session and authentication tests
- **AgenciesApiTest.php** - Agency management API tests
- **UsersApiTest.php** - User management API tests
- **PatientsApiTest.php** - Patient management API tests
- **SurgeriesApiTest.php** - Surgery management API tests
- **RoomsApiTest.php** - Room management API tests
- **TechniciansApiTest.php** - Technician management API tests
- **PhotosApiTest.php** - Photo management API tests
- **ReservationsApiTest.php** - Room reservation API tests
- **AvailabilityApiTest.php** - Room availability API tests
- **TechAvailApiTest.php** - Technician availability API tests
- **run_tests.php** - Test runner script

## Features

### Comprehensive Testing
- **CRUD Operations** - Create, Read, Update, Delete for all entities
- **Data Validation** - Tests for required fields, data types, and constraints
- **Error Handling** - Tests for various error conditions and edge cases
- **Session Management** - Authentication and session validation tests
- **Role-Based Access** - Tests for admin, editor, and agent permissions
- **Database Integrity** - Tests for foreign key constraints and data consistency

### Session & Authentication Testing
- Valid and invalid session scenarios
- Role-based permission testing
- Agency-based data filtering
- Session expiry handling
- Multiple user role scenarios

### API Endpoint Coverage
Each API handler is thoroughly tested with:
- Valid data scenarios
- Missing required data
- Invalid data formats
- Unauthorized access attempts
- Non-existent resource handling
- Duplicate data constraints

## Running the Tests

### Prerequisites
1. PHP 7.4 or higher
2. SQLite database with test data
3. Proper file permissions for test directory

### Running All Tests
```bash
cd test
php run_tests.php
```

### Running Individual Test Classes
```bash
cd test
php -r "
require_once 'PatientsApiTest.php';
\$test = new PatientsApiTest();
\$test->runTests();
"
```

## Test Output

### Console Output
The tests provide colored console output:
- 🟢 **Green** - Passed tests
- 🔴 **Red** - Failed tests
- Test summaries for each class
- Final summary with statistics

### Test Reports
- Automatic generation of markdown test reports
- Timestamped report files
- Detailed failure analysis
- Success rate calculations

## Test Structure

### TestBase Class
Provides common functionality:
- Database initialization
- Test data creation and cleanup
- Session management
- API request simulation
- Assertion methods
- Result tracking

### Individual Test Classes
Each test class extends TestBase and includes:
- Setup and teardown methods
- Comprehensive test scenarios
- Role-based access testing
- Error condition testing

## Test Data Management

### Automatic Cleanup
- Test data is automatically created and cleaned up
- No interference with production data
- Isolated test environment

### Test Agencies and Users
- Creates temporary test agencies
- Creates test users with different roles
- Proper cleanup after test completion

## Common Test Scenarios

### Authentication Tests
```php
// Test without authentication
$this->clearSession();
$response = $this->makeApiRequest('patients', 'list', 'GET');
// Should fail with unauthorized error

// Test with valid session
$this->setSession($user_id, 'admin', $agency_id);
$response = $this->makeApiRequest('patients', 'list', 'GET');
// Should succeed
```

### Role-Based Access Tests
```php
// Test admin access
$this->setSession($user_id, 'admin', $agency_id);
$response = $this->makeApiRequest('agencies', 'get_all', 'GET');
// Should succeed

// Test agent access (should fail)
$this->setSession($user_id, 'agent', $agency_id);
$response = $this->makeApiRequest('agencies', 'get_all', 'GET');
// Should fail with permission error
```

### Data Validation Tests
```php
// Test missing required field
$response = $this->makeApiRequest('patients', 'add', 'POST', [
    'dob' => '1990-01-01'
    // Missing required 'name' field
]);
// Should fail with validation error
```

## Troubleshooting

### Common Issues

1. **Database Connection Errors**
   - Ensure database file exists and is writable
   - Check database path in includes/db.php

2. **Permission Errors**
   - Ensure test directory is writable
   - Check file permissions for test files

3. **Session Issues**
   - Tests manage their own sessions
   - Original session is restored after tests

4. **Memory Issues**
   - Large test suites may require increased memory
   - Use `ini_set('memory_limit', '256M')` if needed

### Debug Mode
Enable debug output by modifying TestBase.php:
```php
// Add debug flag
private $debug = true;

// Add debug output in makeApiRequest method
if ($this->debug) {
    echo "Request: $entity/$action\n";
    var_dump($data);
}
```

## Extending the Tests

### Adding New Test Classes
1. Create new test class extending TestBase
2. Implement runTests() method
3. Add test class to run_tests.php
4. Follow naming convention: EntityApiTest.php

### Adding New Test Methods
```php
private function testNewFeature()
{
    $this->setSession();
    
    $response = $this->makeApiRequest('entity', 'action', 'POST', [
        'data' => 'value'
    ]);
    
    $this->assertTrue($response['success'], 'Should succeed', 'testNewFeature');
    $this->assertArrayHasKey('result', $response, 'Should contain result', 'testNewFeature');
}
```

## Best Practices

1. **Test Isolation** - Each test should be independent
2. **Descriptive Names** - Use clear, descriptive test method names
3. **Comprehensive Coverage** - Test both success and failure scenarios
4. **Clean Data** - Always clean up test data
5. **Clear Assertions** - Use descriptive assertion messages
6. **Role Testing** - Test all user roles for each endpoint

## Contributing

When adding new API endpoints or modifying existing ones:
1. Update corresponding test classes
2. Add tests for new functionality
3. Ensure all tests pass
4. Update documentation as needed

## Support

For issues with the test suite:
1. Check console output for specific error messages
2. Review test report files for detailed failure information
3. Verify database connectivity and permissions
4. Ensure all required dependencies are installed
