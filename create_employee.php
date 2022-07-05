<?php

/**
 * Version details
 *
 * @package    local_employee
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


use local_employee\form\employee as employee;


 require_once(__DIR__ . '/../../config.php');
 require_once($CFG->libdir.'/formslib.php');
 require_login();
 global $DB, $PAGE, $visible;
 $PAGE->requires->jquery();

  $PAGE->requires->js_call_amd('local_employee/formAjax', 'load', array());
  $PAGE->requires->js_call_amd('local_employee/table', 'load', array());
  $PAGE->set_url(new moodle_url('/local/employee/index.php'));
  
  $PAGE->set_context(\context_system::instance());
  
  $PAGE->set_title('employee');
  $employeedata = $DB->get_records('local_employee');

echo "hii bhagyeshwar";

  echo $OUTPUT->header();

  $templatecontext = [
  'messages' => array_values($employeedata),
  'visible' => $visible,
 ];
 echo $OUTPUT->render_from_template('local_employee/index', $templatecontext);
 echo $OUTPUT->footer();


