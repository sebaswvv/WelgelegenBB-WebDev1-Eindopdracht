<?php
require __DIR__ . '/controller.php';

class AvailabilityController extends Controller
{
    # initial load view of home
    public function index()
    {
        # get query string
        $beginDate = $_GET['beginDate'];
        $endDate = $_GET['endDate'];
        $amountOfGuests = $_GET['amountOfGuests'];

        # get all rooms
        require __DIR__ . '/../repositories/bookingrepository.php';
        $bookingRepository = new BookingRepository();
        $rooms = $bookingRepository->getAvailableRooms($amountOfGuests, $beginDate, $endDate);

        # check if there are rooms available
        if (count($rooms) == 0) {
            // TODO: Dit via API doen
            echo '<script>alert("Er zijn geen kamers beschikbaar op de door u gekozen datum")</script>';
            echo '<script> window.location.href = "/"; </script>';
            return;
        }
        $this->displayView($rooms);
    }
}
?>