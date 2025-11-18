correct_md5_hash="a4a34395c98c8a4594887fcff711d2de"

if [ -t 1 ]; then
    original_stty=$(stty -g)
    stty -echo intr undef

    echo -n "Enter Password: "
    read -s password
    echo

    stty "$original_stty"
    input_md5_hash=$(echo -n "$password" | md5sum | awk '{print $1}')

    if [ "$input_md5_hash" != "$correct_md5_hash" ]; then
        echo "SIA SAHAA! Password salah."
        exit 1
    fi
fi
