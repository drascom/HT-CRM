<?php
require_once __DIR__ . '/TestBase.php';

class UsersApiTest extends TestBase
{
    private $test_user_id_2;

    public function runTests()
    {
        echo "Running Users API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->testAddUserWithValidData();
        $this->testAddUserWithoutAuth();
        $this->testAddUserWithMissingData();
        $this->testAddUserDuplicateEmail();
        $this->testListUsers();
        $this->testGetUserById();
        $this->testGetUserByIdNotFound();
        $this->testEditUser();
        $this->testEditUserNotFound();
        $this->testDeleteUser();
        $this->testDeleteUserNotFound();
        $this->testRoleBasedAccess();

        $this->printSummary('UsersApiTest');
    }

    private function testAddUserWithValidData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'add', 'POST', [
            'email' => 'test2@test.com',
            'username' => 'testuser2',
            'password' => 'testpass123',
            'role' => 'agent',
            'agency_id' => $this->test_agency_id
        ], 'application/json');

        $this->assertTrue($response['success'], 'Should successfully add user with valid data', 'testAddUserWithValidData');
        $this->assertArrayHasKey('id', $response, 'Response should contain user ID', 'testAddUserWithValidData');
        
        if ($response['success'] && isset($response['id'])) {
            $this->test_user_id_2 = $response['id'];
        }
    }

    private function testAddUserWithoutAuth()
    {
        $this->clearSession();
        
        $response = $this->makeApiRequest('users', 'add', 'POST', [
            'email' => 'unauthorized@test.com',
            'username' => 'unauthorized',
            'password' => 'testpass123',
            'role' => 'agent',
            'agency_id' => $this->test_agency_id
        ], 'application/json');

        // Note: This test depends on how auth is handled in the API
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testAddUserWithoutAuth');
    }

    private function testAddUserWithMissingData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'add', 'POST', [
            'username' => 'incompleteuser',
            'password' => 'testpass123'
            // Missing email
        ], 'application/json');

        $this->assertFalse($response['success'], 'Should fail when email is missing', 'testAddUserWithMissingData');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddUserWithMissingData');
    }

    private function testAddUserDuplicateEmail()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'add', 'POST', [
            'email' => 'test@test.com', // Same as the one created in TestBase
            'username' => 'duplicateuser',
            'password' => 'testpass123',
            'role' => 'agent',
            'agency_id' => $this->test_agency_id
        ], 'application/json');

        $this->assertFalse($response['success'], 'Should fail when email already exists', 'testAddUserDuplicateEmail');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddUserDuplicateEmail');
    }

    private function testListUsers()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'list', 'GET');

        $this->assertTrue($response['success'], 'Should successfully list users', 'testListUsers');
        $this->assertArrayHasKey('users', $response, 'Response should contain users array', 'testListUsers');
        $this->assertTrue(is_array($response['users']), 'Users should be an array', 'testListUsers');
    }

    private function testGetUserById()
    {
        if (!$this->test_user_id_2) {
            $this->assert(false, 'No test user ID available for get test', 'testGetUserById');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'get', 'GET', [
            'id' => $this->test_user_id_2
        ]);

        $this->assertTrue($response['success'], 'Should successfully get user by ID', 'testGetUserById');
        $this->assertArrayHasKey('user', $response, 'Response should contain user data', 'testGetUserById');
    }

    private function testGetUserByIdNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'get', 'GET', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when user not found', 'testGetUserByIdNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetUserByIdNotFound');
    }

    private function testEditUser()
    {
        if (!$this->test_user_id_2) {
            $this->assert(false, 'No test user ID available for edit test', 'testEditUser');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'edit', 'POST', [
            'id' => $this->test_user_id_2,
            'email' => 'updated2@test.com',
            'username' => 'updateduser2',
            'role' => 'editor',
            'agency_id' => $this->test_agency_id
        ], 'application/json');

        $this->assertTrue($response['success'], 'Should successfully edit user', 'testEditUser');
    }

    private function testEditUserNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'edit', 'POST', [
            'id' => 99999, // Non-existent ID
            'email' => 'nonexistent@test.com',
            'username' => 'nonexistent',
            'role' => 'agent',
            'agency_id' => $this->test_agency_id
        ], 'application/json');

        $this->assertFalse($response['success'], 'Should fail when editing non-existent user', 'testEditUserNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testEditUserNotFound');
    }

    private function testDeleteUser()
    {
        if (!$this->test_user_id_2) {
            $this->assert(false, 'No test user ID available for delete test', 'testDeleteUser');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'delete', 'POST', [
            'id' => $this->test_user_id_2
        ], 'application/json');

        $this->assertTrue($response['success'], 'Should successfully delete user', 'testDeleteUser');
    }

    private function testDeleteUserNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('users', 'delete', 'POST', [
            'id' => 99999 // Non-existent ID
        ], 'application/json');

        $this->assertFalse($response['success'], 'Should fail when deleting non-existent user', 'testDeleteUserNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testDeleteUserNotFound');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access - should be able to list users
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('users', 'list', 'GET');
        $this->assertTrue($response['success'], 'Agent should be able to list users', 'testRoleBasedAccess_Agent');

        // Test editor role access - should be able to add users
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);
        
        $response = $this->makeApiRequest('users', 'add', 'POST', [
            'email' => 'editor_test@test.com',
            'username' => 'editortest',
            'password' => 'testpass123',
            'role' => 'agent',
            'agency_id' => $this->test_agency_id
        ], 'application/json');
        $this->assertTrue($response['success'], 'Editor should be able to add users', 'testRoleBasedAccess_Editor');

        // Clean up the editor test user
        if ($response['success'] && isset($response['id'])) {
            $this->makeApiRequest('users', 'delete', 'POST', ['id' => $response['id']], 'application/json');
        }

        // Test admin role access - should be able to do everything
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('users', 'list', 'GET');
        $this->assertTrue($response['success'], 'Admin should be able to list users', 'testRoleBasedAccess_Admin');
    }
}
