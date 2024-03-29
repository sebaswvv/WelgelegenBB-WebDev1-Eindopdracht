<?php
require_once __DIR__ . '/../models/booking.php';
require_once __DIR__ . '/../models/customer.php';
require_once __DIR__ . '/../models/room.php';
require_once __DIR__ . '/controller.php';

session_start();

class ReservationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        # get the room id from the url and get the room from the database
        $room = $this->service->getRoomById(htmlspecialchars($_GET['roomid']));

        require_once __DIR__ . '/../views/reservation/index.php';
    }

    public function bookRoom()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # sanitize input
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $phone_number = htmlspecialchars($_POST['phone_number']);
            $postal_code = htmlspecialchars($_POST['postal_code']);
            $house_number = htmlspecialchars($_POST['house_number']);
            $streetname = htmlspecialchars($_POST['streetname']);
            $residence = htmlspecialchars($_POST['residence']);

            # take out all the spaces from some input fields
            $phone_number = str_replace(' ', '', $phone_number);
            $postal_code = str_replace(' ', '', $postal_code);
            $house_number = str_replace(' ', '', $house_number);
            $streetname = str_replace(' ', '', $streetname);
            $residence = str_replace(' ', '', $residence);

            # create new customer with this data
            $customer = new Customer($firstname, $lastname, $email, $phone_number, $postal_code, $house_number, $streetname, $residence);

            # get the booking from the session and add the customer
            $booking = $_SESSION['booking'];
            $booking->customer = $customer;

            # book the room            
            $bookingId = $this->service->bookRoom($booking);

            # redirect to the booked page with email and booking id
            header('Location: /booked?email=' . $email . '&bookingid=' . $bookingId);
        }
    }
}
?>