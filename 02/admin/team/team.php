<?php 
class TeamManager {
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function getTeamMembers() {
        $teamMembers = [];
        $fp = fopen($this->file, 'r');
        $headers = fgetcsv($fp);

        while (($data = fgetcsv($fp)) !== false) {
            $teamMember = array_combine($headers, $data);
            $teamMembers[] = $teamMember;
        }

        fclose($fp);
        return $teamMembers;
    }

    public function getTeamMember($teamMemberName) {
        $teamMember = null;
        $file = fopen($this->file, "r");
        $headers = fgetcsv($file); // Skip headers

        while (($data = fgetcsv($file)) !== false) {
            $teamMember = array_combine($headers, $data);
            if ($teamMember['Team member'] == $teamMemberName) {
                fclose($file);
                return $teamMember;
            }
        }

        fclose($file);
        return $teamMember;
    }

    public function createTeamMember($teamMember) {
        $file = fopen($this->file, "a");
        fputcsv($file, $teamMember);
        fclose($file);
    }

    public function updateTeamMember($teamMemberName, $updatedTeamMember) {
        $file = fopen($this->file, "r+");
        $headers = fgetcsv($file); // Skip headers
        $updated = false;
        $newData = [];

        while (($data = fgetcsv($file)) !== false) {
            $teamMember = array_combine($headers, $data);
            if ($teamMember['Team member'] == $teamMemberName) {
                $newData[] = $updatedTeamMember;
                $updated = true;
            } else {
                $newData[] = $teamMember;
            }
        }

        if ($updated) {
            rewind($file);
            fputcsv($file, $headers);

            foreach ($newData as $data) {
                fputcsv($file, $data);
            }

            ftruncate($file, ftell($file));
        }

        fclose($file);
        return $updated;
    }

    public function deleteTeamMember($teamMemberName) {
        $file = fopen($this->file, "r+");
        $headers = fgetcsv($file); // Skip headers
        $deleted = false;
        $newData = [];

        while (($data = fgetcsv($file)) !== false) {
            $teamMember = array_combine($headers, $data);
            if ($teamMember['Team member'] == $teamMemberName) {
                $deleted = true;
            } else {
                $newData[] = $teamMember;
            }
        }

        if ($deleted) {
            rewind($file);
            fputcsv($file, $headers);

            foreach ($newData as $data) {
                fputcsv($file, $data);
            }

            ftruncate($file, ftell($file));
        }

        fclose($file);
        return $deleted;
    }
}
?>